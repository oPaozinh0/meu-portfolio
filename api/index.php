<?php

// public/index.php
define('LARAVEL_START', microtime(true));

// Register the Composer autoloader.
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request.
echo (require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Illuminate\Http\Request::capture());