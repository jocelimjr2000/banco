<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    public function findAll()
    {
        $list = Tipo::all();

        return response()->json($list);
    }
}
