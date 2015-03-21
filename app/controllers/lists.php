<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 3/18/15
 * Time: 3:13 PM
 */
namespace controllers;
use core\view;
use models\Article;

class Lists extends \core\controller {

    private $model;
    private $page;
    private $keywords;

    public function __construct() {
        parent::__construct();

        $this->model = new Article();
        $this->page = 1;
        $this->keywords = "食欲不振";
    }

    public function search() {
        $this->getParameters();

        $data = [
            'title' => 'Test Page',
            'message' => 'Hello, this is a test page!',
            'articleList' => $this->model->search($this->keywords, $this->page)
        ];

        View::rendertemplate('header', $data);
        View::render('list/articleList', $data);
        View::rendertemplate('footer', $data);
    }

    /**
     * 获取参数, 如关键字, 页码
     */
    private function getParameters() {
        if (isset($_GET['keywords']))
            $this->keywords = $_GET['keywords'];

        if (isset($_GET['page']))
            $this->page = $_GET['page'];
    }
}