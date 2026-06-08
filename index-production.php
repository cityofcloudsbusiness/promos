<?php

declare(strict_types=1);

/**
 * Laravel Index - Production (Hostinger Option B)
 * 
 * Este arquivo deve ser copiado para:
 * /home/u114880334/domains/cityagency.online/public_html/index.php
 * 
 * Ele aponta para o Laravel instalado em:
 * /home/u114880334/promos/
 */

define('LARAVEL_START', microtime(true));

// Register the auto loader units for composer. Composer loads all of the
// dependencies of your project.
require '/home/u114880334/promos/vendor/autoload.php';

// Include Composer's platform check early to abort gracefully.
// If Composer has not run yet, these autoloaders will not exist.
if (file_exists('/home/u114880334/promos/vendor/composer/platform_check.php')) {
    require '/home/u114880334/promos/vendor/composer/platform_check.php';
}

/*
|--------------------------------------------------------------------------
| Bootstrap Laravel And Handle The Request
|--------------------------------------------------------------------------
|
| Without this file, Laravel would not be bootstrapped and running. We'll
| load the Illuminate kernel and handle the incoming request to send back
| a response to the browser.
|
*/

$app = require_once '/home/u114880334/promos/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
