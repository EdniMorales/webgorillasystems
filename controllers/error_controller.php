<?php

class ErrorController {
    // ====== E R R O R E S ======
    public function index() {
        // Error 500
        $this->render("500", "Error interno del servidor");
    }

    public function notFound() {
        // Error 404
        $this->render("404", "Página no encontrada");
    }

    public function forbidden() {
        // Error 403
        $this->render("403", "Acceso denegado");
    }

    public function badRequest() {
        // Error 400
        $this->render("400", "Solicitud inválida");
    }

    // ====== E S T A D O S ======
    public function warning($msg, $file, $line) {
        // Advertencia
        $this->render("warning", "Advertencia: $msg en $file:$line");
    }

    public function notice($msg, $file, $line) {
        // Informativo
        $this->render("notice", "Aviso: $msg en $file:$line");
    }

    public function internal($msg, $file, $line) {
        // Critico
        $this->render("500", "Error crítico: $msg en $file:$line");
    }

    public function exception($exception) {
        // Excepcion
        $this->render(
            "exception",
            "Excepción no capturada: {$exception->getMessage()}"
        );
    }
    
    private function render($view, $message) {
        require_once __DIR__ . '/../errors/' . $view . '.php';
    }
}

?>