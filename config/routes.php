<?php

function handle_route($controller, $action) {

    // Normalización
    $controller = strtolower(trim($controller ?? ''));
    $action     = strtolower(trim($action ?? ''));

    //echo $controller . " - " . $action;

    // Tabla de rutas: controlador → acción → [ControllerClass, method]
    $routes = [

        'about' => [
            'about' => ['AboutController', 'about']
        ],

        'blog' => [
            'home' => ['BlogController', 'home'],
            'post' => ['BlogController', 'post']
        ],

        'contact' => [
            'contact' => ['ContactController', 'contact']
        ],

        'faq' => [
            'faq' => ['FaqController', 'faq']
        ],

        'home' => [
            'home' => ['HomeController', 'home']
        ],

        'portafolio' => [
            'item'     => ['PortafolioController', 'item'],
            'overview' => ['PortafolioController', 'overview']
        ],

        'princing' => [
            'princing' => ['PrincingController', 'princing']
        ],

        // Controlador por defecto
        '' => [
            'home' => ['HomeController', 'home']
        ]
    ];

    // Validar controlador
    if (!isset($routes[$controller])) {
        return false;
    }

    // Validar acción (si no existe, intenta default)
    if (!isset($routes[$controller][$action])) {

        // Si existe método "index", úsalo como fallback
        if (isset($routes[$controller]['index'])) {
            return $routes[$controller]['index'];
        }

        return false;
    }

    // Ruta válida:
    return $routes[$controller][$action];
}

?>
