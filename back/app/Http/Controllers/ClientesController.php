<?php
namespace App\Http\Controllers;

class ClientesController
{

    public function index() {
        return app('db')->select("SELECT * FROM clientes");
    }
}
