<?php

// Define o diretório raiz da sua aplicação Laravel.
$root = dirname(__DIR__);

// Carrega o autoloader do Composer.
require_once $root . '/vendor/autoload.php';

// Inicia a aplicação Laravel.
$app = require_once $root . '/bootstrap/app.php';

// Cria o kernel HTTP.
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Captura a requisição e a envia para o kernel.
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Envia a resposta de volta para a Vercel.
$response->send();

// Termina o ciclo da requisição/resposta.
$kernel->terminate($request, $response);