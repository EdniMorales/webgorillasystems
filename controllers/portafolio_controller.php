<?php
class PortafolioController {

    public function item() {
        // lógica para mostrar la vista Portafolio-Item
        render_view('PortafolioItemView');
    }

    public function overview() {
        // lógica para mostrar la vista Portafolio-Overview
        render_view('PortafolioOverviewView');
    }
}
?>