<?php

namespace App\Db;

use \PDO;
use PDOException;

class Database {
    
    // Servidor do DB
    const HOST = 'localhost';
    // Nome do DB
    const DB_NAME = 'titan_teste';
    // Credenciais de acesso ao DB
    const USER = 'root';
    const PASSWD = '';

    /**
     * Tabela a ser manipulada
     * @var string
     */
    private $table;
    /**
     * Instancia da conexão com o DB
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela para instanciar a conexão
     *
     * @param string $table
     */
    public function __construct ($table = null) {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Cria a conexão com o banco
     */
    private function setConnection () {
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DB_NAME,self::USER,self::PASSWD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR: ". $e->getMessage());
        }
    }
     
    /**
     * Executa query no banco de dados
     *
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute ($query, $params = []) {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("ERROR: ". $e->getMessage());
        }
    }

    /**
     * Executa queries mais complexas
     *
     * @param string $query
     * @param array $params
     * @return void
     */
    public function raw ($query, $params = []) {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die("ERROR: ". $e->getMessage());
        }
    }

    /**
     * Executa um INSERT no banco
     *
     * @param array $values [field => value]
     * @return integer id inserido
     */
    public function insert ($values) {
        $dataQuery = array_keys($values);
        $binds = array_pad([], count($dataQuery),'?');
        
        $sqlQuery = 'INSERT INTO '.$this->table.' ('.implode(',', $dataQuery).') VALUES ('.implode(',',$binds).')';
        
        $this->execute($sqlQuery, array_values($values));

        // retorna o ID inserido
        return $this->connection->lastInsertId();
    }

    /**
     * Executa um SELECT no banco
     *
     * @param string $condition
     * @param string $order
     * @param string $limit
     * @return PDOStatement
     */
    public function select ($condition = null, $order = null, $limit = null, $fields = '*') {
        $condition = strlen($condition) ? 'WHERE '. $condition : '';
        $order = strlen($order) ? 'ORDER BY '. $order : '';
        $limit = strlen($limit) ? 'LIMIT '. $limit : '';
        
        $sqlQuery = 'SELECT '.$fields.' FROM '.$this->table.' '.$condition.' '.$order.' '.$limit;

        return $this->execute($sqlQuery);
    }

    /**
     * Executa atualizações no banco
     *
     * @param string $condition
     * @param array $values
     * @return boolean
     */
    public function update ($condition, $values) {
        $fields = array_keys($values);


        $sqlQuery = 'UPDATE '.$this->table.' SET '.implode('=?, ',$fields).'=? WHERE '.$condition;

        $this->execute($sqlQuery, array_values($values));

        return true;
    }

    /**
     * Exclui dados do banco
     *
     * @param string $condition
     * @return boolean
     */
    public function delete ($condition) { 
        $sqlQuery = 'DELETE FROM '.$this->table.' WHERE '.$condition;

        $this->execute($sqlQuery);

        return true;
    }
}
