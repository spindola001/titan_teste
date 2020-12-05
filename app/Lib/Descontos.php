<?php

/**
 * Trata os descontos da loja
 */

namespace App\Lib;

class Descontos
{
    /**
     * Trata descontos
     *
     * @param float $preco
     * @param string $cor
     * @return float
     */
    public static function desconto ($preco, $cor) {
        
        if ($cor === 'Azul' || $cor === 'Vermelho') {
            $desconto = $preco * 20 / 100;
        }
        if ($cor === 'Amarelo') {
            $desconto = $preco * 10 / 100;
        }
        if ($cor === 'Vermelho' && $preco > 50.00) {
            $desconto = $preco * 5 / 100;
        }

        if (isset($desconto)) {
            return $desconto;
        }

    }
}
