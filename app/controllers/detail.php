<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 3/18/15
 * Time: 3:12 PM
 */
namespace controllers;
use core\view;
use models\Article;

class Detail extends \core\controller {

    private $model;
    private $id;

    public function __construct() {
        parent::__construct();

        $this->model = new Article();
        $this->id = 1354;
    }

    public function article() {
        if (isset($_GET['id']))
            $this->id = $_GET['id'];

        $data = [
            'title' => 'Test Page',
            'message' => 'Hello, this is a test page!',
            'article' => $this->model->getDetailArticle($this->id),
            'relatedArticles' => $this->model->getRelatedArticle($this->id),
        ];

        View::rendertemplate('header', $data);
        View::render('detail/article', $data);
        View::rendertemplate('footer', $data);
    }
}