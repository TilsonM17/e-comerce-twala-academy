<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index()
    {
        return view('index', [
            'nome' => 'Tilson',
            'idade' => 67,
            'morada' => 'Viana',
            'skills' => [
                'php',
                'laravel',
                'db'
            ]

        ]);
    }
}
