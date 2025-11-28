<?php

require_once __DIR__ . '../config/helpers.php';
require_once __DIR__ . '../config/autoload.php';
require_once __DIR__ . '../config/parameters.php';
require_once __DIR__ . '../config/routes.php';  // <-- incluye tu route.php

// Si no vienen parámetros, redirige a la ruta por defecto
if (!isset($_GET['controller']) && !isset($_GET['action'])) {
    header('Location: ' . base_url . 'Home/home');
    exit();
}

// Solo incluye el encabezado si NO es Login/login
if (!($_GET['controller'] === 'Login' && $_GET['action'] === 'login')) {
    require_once __DIR__ . '../views/layouts/doctype.php';
    require_once __DIR__ . '../views/layouts/header.php';
} else {
    require_once __DIR__ . '../views/layouts/doctype.php';
}

function show_error(){
    $error = new ErrorController();
    $error->index();
}

set_error_handler(function($errno, $errstr, $errfile, $errline) {

    $error = new ErrorController();

    switch ($errno) {
        case E_USER_WARNING:
        case E_WARNING:
            $error->warning($errstr, $errfile, $errline);
            break;

        case E_USER_NOTICE:
        case E_NOTICE:
            $error->notice($errstr, $errfile, $errline);
            break;

        case E_USER_ERROR:
        case E_ERROR:
        default:
            $error->internal($errstr, $errfile, $errline);
            break;
    }

    exit();
});

set_exception_handler(function($exception) {
    $error = new ErrorController();
    $error->exception($exception);
    exit();
});


// Obtenemos controller y action de GET (se puede poner valores por defecto si se requiere)
$controller = $_GET['controller'] ?? '';
$action = $_GET['action'] ?? '';

// Usamos la función handle_route para obtener el controlador y método a ejecutar
$route = handle_route($controller, $action);

if ($route !== false) {
    list($controllerName, $methodName) = $route;

    if (class_exists($controllerName)) {
        $controlador = new $controllerName();

        //var_dump($controlador);

        if (method_exists($controlador, $methodName)) {
            $controlador->$methodName();
        } else {
            show_error();
        }
    } else {
        show_error();
    }
} else {
    show_error();
}

// Solo incluye pie de la pagina si NO es Login/login
if (!($_GET['controller'] === 'Login' && $_GET['action'] === 'login')) {
    require_once __DIR__ . '../views/layouts/footer.php';
}

// Colocar los scripts de la pagina
require_once __DIR__ . '../views/layouts/scripts.php';
?>