<?php
namespace App\Http\Controllers;

class ComprasController
{
    public function index(){
        return json_encode(app('db')->select("SELECT * FROM historico_vendas"));
    }
}
