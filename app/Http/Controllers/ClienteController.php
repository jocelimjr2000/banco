<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteCreateRequest;
use App\Models\Cliente;
use App\Models\Conta;
use Exception;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function create(ClienteCreateRequest $request)
    {
        // Ler mais sobre transações
        DB::beginTransaction();

        try {
            $cliente = new Cliente();
            $cliente->nome = $request->nome;
            $cliente->ref = $request->ref;
            $cliente->save();

            $conta = new Conta();
            $conta->n_conta = rand(1000, 10000);
            $conta->saldo = $request->depInicial;
            $conta->id_tipo = $request->tipo;
            $conta->id_cliente = $cliente->id;
            $conta->save();

            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
            throw $e;
        }

        return response()->json($cliente);
    }
}
