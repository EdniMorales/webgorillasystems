<?php
// Funcion para renderizar las vistas
function render_view($view, $data = []) {
    // Extraer variables del array asociativo (si hay datos a pasar)
    if (!empty($data)) {
        extract($data);
    }

    $viewFile = __DIR__ . '/../views/' . $view . '.php';

    if (file_exists($viewFile)) {
        include $viewFile;
    } else {
        include __DIR__ . '/../errors/404.php';
    }
}
?>