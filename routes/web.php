<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


/**
 * 
 * 
 * Verbos HTTP
 * HTTP - Hypertext Transfer Protocol
 *  
 * GET - bUSCAR INFORMAÇÃO
 * POST - CRIAR NOVO RECURSO
 * PUT - ATUALIZAR RECURSO EXISTENTE
 * DELETE - EXCLUIR 
 */

Route::get('/sobre', [HomeController::class, 'sobre']);
Route::get('/', [MainController::class, 'index']);
