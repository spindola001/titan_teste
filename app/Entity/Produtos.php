<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Produtos {
    /**
     * Identificador unico do produto
     * @var integer
     */
    public $id;
    
    /**
     * Nome do produto
     * @var string
     */
    public $nome;
    /**
     * Cor do produto
     * @var string
     */
    public $cor;

    /**
     * Cadastra os produtos no banco de dados
     *
     * @return boolean
     */
    public function cadastrar () {

        $objDataBase = new Database("produtos");
        
        $this->id = $objDataBase->insert([
                                'nome' => $this->nome,
                                'cor' => $this->cor,
                            ]);
        return true;
    }


    /**
     * Atualiza o produto no banco
     *
     * @return boolean
     */
    public function atualizar () {
        return (new Database('produtos'))->update('id ='.$this->id, [
                                                'nome' => $this->nome,
                                                'cor' => $this->cor,
                                            ]);
    }

    /**
     * Exclui produto do banco
     *
     * @return boolean
     */
    public function excluir () {
        return (new Database('produtos'))->delete('id ='.$this->id);
    }

    /**
     * Obtém os dados das tabela Produtos e Precos relacionados
     *
     * @return Produtos
     */
    public static function listProdutosComPrecos () {
        return (new Database('produtos'))->raw('SELECT produtos.cor, produtos.id, produtos.nome, precos.preco FROM precos INNER JOIN produtos_precos ON precos.id = produtos_precos.preco_id RIGHT JOIN produtos ON produtos.id = produtos_precos.produto_id');
    }

    /**
     * Obtém resultado de um pesquisa
     *
     * @param string $where
     * @return Produtos
     */
    public static function pesquisaProdutos ($where) {
        $where = strlen($where) ? "WHERE ".$where : "";

        return (new Database('produtos'))->raw("SELECT produtos.cor, produtos.id, produtos.nome, precos.preco FROM precos INNER JOIN produtos_precos ON precos.id = produtos_precos.preco_id RIGHT JOIN produtos ON produtos.id = produtos_precos.produto_id ".$where);
    }

    /**
     * Busca um único produto pelo ID
     *
     * @param integer $id
     * @return Produtos
     */
    public static function getProduto ($id) {
        return (new Database('produtos'))->select('id ='.$id)
                                        ->fetchObject(self::class);
    }
}
