<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 3/18/15
 * Time: 3:08 PM
 */
namespace controllers;
use core\view;
use models\Article;

class Home extends \core\controller {

    private $model;

    public function __construct() {
        parent::__construct();
        $this->model = new Article();
    }

    public function index() {
        $data = [
            'title' => 'Test Page',
            'message' => 'Hello, this is a test page!',
            'tags' => $this->model->getTags(),
            'scrollList' => $this->model->getArticles(1),
            'wapList' => $this->model->getArticles(2)
        ];

        View::rendertemplate('header', $data);
        View::render('home/index', $data);
        View::rendertemplate('footer', $data);
    }
}