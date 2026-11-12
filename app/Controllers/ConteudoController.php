<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface; 
use App\Models\ConteudoModel;

class ConteudoController extends BaseController
{
    protected $helpers = ['192.168.51.20/a28574/ads209/sistema/public'];

    public function index(): string
    {
        $conteudoModel = new ConteudoModel();   

        $dados['conteudo'] = $conteudoModel->find(1);

        return view('home', $dados);
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

    public function listar(): string
    {
        $Model = new ConteudoModel();

        $dados['conteudos'] = $Model->findAll();

        return view('conteudo/listar', [
        'conteudos' => $Model->findAll(),
        ]);
    }

    public function editar($id): string
    {
        $Model = new ConteudoModel();
        $conteudo = $Model->find($id);
        
        if ($conteudo === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'O conteúdo solicitado não foi encontrado.');
        }

        return view('conteudo/editar', [
            'conteudo' => $conteudo,
            'erros' => [],
        ]);
        }
    

    public function atualizar($id)
    {
        $model = new ConteudoModel();
        $conteudo = $model->find($id);

        if ($conteudo === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'O conteúdo solicitado não foi encontrado.');
        }

        $dadosPost = [
            'Titulo' => $this->request->getPost('Titulo'),
            'Text' => $this->request->getPost('Text'),
        ];

        $regras = [
            'Titulo' => 'required|max_length[255]',
            'Text' => 'required',
        ];

        if (!$this->validate($regras)) {
            $conteudo['Titulo'] = $dadosPost['Titulo'] ?? '';
            $conteudo['Text'] = $dadosPost['Text'] ?? '';

            return view('editar', [
                'conteudo' => $conteudo,
                'erros' => $this->validator->getErrors(),
            ]);
        }

        $model->update($id, $dadosPost);

        return redirect()
            ->to(site_url('conteudos'))
            ->with('mensagem', 'Conteúdo atualizado com sucesso.');
    }
}

