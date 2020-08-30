<?php

namespace App\Http\Controllers;


class ClientesSaldoController
{
    public function insert($idCliente,$valor) {
        app('db')->insert("INSERT INTO saldo_clientes (id_cliente,saldo_atual) VALUES (?,?)", [$idCliente,$valor]);
    }

    public function update($idCliente, $valor)
    {
        app('db')->update("UPDATE saldo_clientes SET saldo_atual = ? WHERE id_cliente = ?", [$valor,$idCliente]);
    }
}
