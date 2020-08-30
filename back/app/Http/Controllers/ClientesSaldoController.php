<?php

namespace App\Http\Controllers;


class ClientesSaldoController
{

    public function getSaldoId($idCliente) {
       return app('db')->select("SELECT saldo_atual FROM saldo_clientes WHERE id_cliente = ?", [$idCliente]);
    }

    public function insert($idCliente,$valor) {
        app('db')->insert("INSERT INTO saldo_clientes (id_cliente,saldo_atual) VALUES (?,?)", [$idCliente,$valor]);
    }

    public function update($idCliente, $valor)
    {
        $saldoAtual = $this->getSaldoId($idCliente);

        if (!empty($saldoAtual)) {
            $saldoFinal = intval($saldoAtual[0]->saldo_atual - $valor) ;
        } else {
            $saldoFinal = $valor;
        }

        app('db')->update("UPDATE saldo_clientes SET saldo_atual = ? WHERE id_cliente = ?", [$saldoFinal,$idCliente]);
    }
}
