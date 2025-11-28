<?php
class BlogController {

    public function home() {
        // lógica para mostrar la vista home
        render_view('blogHomeView');
    }

    public function post() {
        // lógica para mostrar la vista home
        render_view('blogPostView');
    }
}
?>