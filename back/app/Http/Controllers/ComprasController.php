<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ComprasController
{

    public function index(){
        return json_encode(app('db')->select("SELECT * FROM historico_vendas"));
    }

    public function insert(Request $request){

        $idCliente = $request->input('id_cliente');
        $valor = $request->input('valor');
        $acao = $request->input('acao');

        if (!empty($idCliente) && !empty($valor) && !empty($acao)) {

            $historico = new HistoricoComprasController();
            $clienteSaldo = new ClientesSaldoController();

           $historico->insert($idCliente,$valor,$acao);

           switch ($acao) {
               case "compra":
                    $clienteSaldo->insert($idCliente,$valor);
                   break;
               case "debito":
                   $clienteSaldo->update($idCliente,$valor);
                   break;
           }

           return json_encode(['status' => 'Compra Cadastrada']);

        }

        return json_encode(['status' => 'Erro ao cadastrar']);
    }
}
