<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Precos {
    /**
     * Identificador unico do preço
     * @var integer
     */
    public $id;

    public $produto_id;   
    
    /**
     * @var double
     */
    public $preco;

    /**
     * Cadastra os preços no banco
     *
     * @return boolean
     */
    public function cadastrar () {

        $objDataBase = new Database('precos');
        
        $this->id = $objDataBase->insert([
                                'preco' => $this->preco,
                            ]);
        return true;
    }


    /**
     * Atualiza o preço no banco
     *
     * @return boolean
     */
    public function atualizar () {
        return (new Database('precos'))->update('id ='.$this->id, [
                                                'preco' => $this->preco,
                                            ]);
    }

    /**
     * Exclui preço do banco
     *
     * @return boolean
     */
    public function excluir () {
        return (new Database('precos'))->delete('vaga_id ='.$this->vaga_id);
    }

    /**
     * Obtém os preços cadastrados no banco
     *
     * @param string $condition
     * @param string $order
     * @param string $limit
     * @return array instâncias dos preços || array void caso não encontre preços cadastrados
     */
    public static function getPrecos ($condition = null, $order = null, $limit = null) {
        return (new Database('precos'))->select($condition, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Busca um únio preço pelo ID
     *
     * @param integer $id
     * @return Precos
     */
    public static function getPreco ($id) {
        return (new Database('precos'))->select('id ='.$id)
                                        ->fetchObject(self::class);
    }
}
