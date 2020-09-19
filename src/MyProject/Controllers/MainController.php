<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles;
use MyProject\View\View;

class MainController {

    /** @var View  */
    private $view;

    public function __construct() {
        $this->view = new View(__DIR__.'/../../templates');
    }

    public function main() {
        $articles = Articles::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }
}