<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
service('auth')->routes($routes);

$routes->get('/', 'home::index');
$routes->get('/home', 'ConteudoController::index');
$routes->get('/contato', 'ConteudoController::contato');
$routes->get('/quemsou', 'ConteudoController::quemsou');
$routes->get('/produtos', 'ConteudoController::produtos');

// Rotas que exigem autenticação por sessão
$routes->group('', ['filter' => 'session'], static function ($routes) {
    $routes->get('conteudos','ConteudoController::listar');
    $routes->get('conteudo/editar/(:num)','ConteudoController::editar/$1');
    $routes->post('conteudo/atualizar/(:num)','ConteudoController::atualizar/$1');
});

// Painel: exige login e grupo admin
$routes->get('admin', 'Admin\Painel::index', [
 'filter' => ['session', 'group:admin'],
]);

// Logout: aceita apenas usuários autenticados
$routes->post('admin/sair', 'Admin\Painel::logout', [
 'filter' => 'session',
]);
