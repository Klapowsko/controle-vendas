<?php

namespace App\Http\Controllers;


class HistoricoComprasController
{
    public function insert($idCliente,$valor,$acao)
    {
        app('db')->insert("INSERT INTO historico_vendas (id_cliente,valor,acao) VALUES (?,?,?)", [$idCliente, $valor, $acao]);
    }
}
