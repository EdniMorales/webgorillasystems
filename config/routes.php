<?php

function handle_route($controller, $action) {
    $routes = [

        // Formato: 'ruta' => [Controlador, Método]
        'home'     => ['HomeController', 'home'],
        'login'     => ['LoginController', 'login'],

        // Ruta por defecto
        ''           => ['LoginController', 'login'],
    ];

    $key = strtolower(trim($controller)); // sanitizar

    if (array_key_exists($key, $routes)) {
        return $routes[$key];
    } else {
        return false; // Ruta no encontrada
    }
}

?>