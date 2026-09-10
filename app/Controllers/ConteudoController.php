<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface; 
use App\Models\ConteudoModel;

class ConteudoController extends BaseController
{
    public function index(): string
    {
        $conteudoModel = new ConteudoModel();   

        $dados['conteudo'] = $conteudoModel->find(1);

        return view('home',$dados);
    }

    public function contato(): string
    {
        $contatoModel = new ConteudoModel();

        $dados['contato'] = $contatoModel->find(2);

        return view('contato', $dados);
    } 

    public function quemsou(): string
    {
        $quemsouModel = new ConteudoModel();

        $dados['quemsou'] = $quemsouModel->find(3);

        return view('quemsou', $dados);
    }

    public function produtos(): string
    {
        $produtosModel = new ConteudoModel();

        $dados['produtos'] = $produtosModel->find(4);

        return view('produtos', $dados);
    }
}