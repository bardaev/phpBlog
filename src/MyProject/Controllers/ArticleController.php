<?php


namespace MyProject\Controllers;

use MyProject\Models\Articles;
use MyProject\Models\User;
use MyProject\View\View;

class ArticleController {

    /** @var View */
    private $view;

    public function __construct() {
        $this->view = new View(__DIR__.'/../../templates');
    }

    public function view(int $articleId) {

        $article = Articles::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $this->view->renderHtml('articles/view.php', ['article' => $article]);
    }

    public function edit(int $articleId): void {
        var_dump($articleId);
        $article = Articles::getById($articleId);

        if ($articleId === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article->setName('test');
        $article->setText('test');
        $article->save();
    }

    public function add(): void {
        $author = User::getById(1);

        $article = new Articles();
        $article->setAuthorId($author);
        $article->setName('Article Name');
        $article->setText('New text');

        $article->save();
    }
}