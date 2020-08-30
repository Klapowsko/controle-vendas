<?php
namespace App\Http\Controllers;

class ClientesController
{

    public function index() {
        return app('db')->select("SELECT * FROM clientes");
    }

    public function clienteId($id) {
        return app('db')->select("SELECT * FROM clientes where id = $id");
    }
}
