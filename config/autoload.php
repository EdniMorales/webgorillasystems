<?php
function controllers_autoload($classname) {
    // Normalizar nombre de clase (mantener mayúscula inicial)
    $classname = ucfirst($classname);

    // Ruta absoluta al controlador
    $ruta = __DIR__ . '/../controllers/' . $classname . '.php';


    if (file_exists($ruta)) {
        include $ruta;
    } else {
        // Controlador no encontrado, mostrar 404
        include __DIR__ . '/../errors/404.php';
        exit;
    }
}
spl_autoload_register('controllers_autoload');