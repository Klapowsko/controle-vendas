<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController
{

    public function index()
    {
        return json_encode(app('db')->select("SELECT * FROM clientes"));
    }

    public function getClientebyId($id)
    {
        return json_encode(app('db')->select("SELECT * FROM clientes where id = ?", [$id]));
    }

    public function findCliente($email)
    {
        return app('db')->select("SELECT * FROM clientes where email = ?", [$email]);
    }

    public function insert(Request $request)
    {
        $nome = $request->input('nome');
        $email = $request->input('email');

        if (!empty($nome) && !empty($email)) {
            $clienteJaCadastrado = $this->findCliente($email);
            if (empty($clienteJaCadastrado)) {
                app('db')->insert('insert into clientes (nome, email) values (?, ?)', [$nome, $email]);
                return json_encode(['status' => 'Cliente cadastrado']);
            }
            return json_encode(['status' => 'Cliente já cadastrado']);
        }
        return json_encode(['status' => 'Erro ao cadastrar']);
    }

    public function update(Request $request)
    {
        $nome = $request->input('nome');
        $email = $request->input('email');

        if (!empty($nome) && !empty($email)) {
            $clienteJaCadastrado = $this->findCliente($email);
            if (!empty($clienteJaCadastrado)) {
                app('db')->select("UPDATE clientes SET nome = ?,email = ? where id = ?",
                    [$nome, $email, $clienteJaCadastrado[0]->id]);
                return json_encode(['status' => 'Atualizado com sucesso']);
            }
            return json_encode(['status' => 'Erro cliente nao cadastrado']);
        }
        return json_encode(['status' => 'Erro ao Atualizar']);
    }


    public function delete($id)
    {
        return app('db')->select("UPDATE clientes SET ativo = 0 where id = ?", [$id]);
    }
}
