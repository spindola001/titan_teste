<?php

namespace App\Entity;

use App\Db\Database;

class Produtos_Precos {
    /**
     * Identificador único do produto
     * @var integer
     */
    public $produto_id;
    /**
     * Identificador único do preço
     *
     * @var integer
     */
    public $preco_id;

    /**
     * Cadastra os preços no banco
     *
     * @return boolean
     */
    public function cadastrar () {

        $objDataBase = new Database('produtos_precos');
        
        $objDataBase->insert([
                                'produto_id' => $this->produto_id,
                                'preco_id' => $this->preco_id
                            ]);
        return true;
    }
}
