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
        $this->keywords = "痛风";
    }

    public function search() {
        $this->getParameters();

        $data = [
            'page' => $this->page,
            'keywords' => $this->keywords,
            'articleList' => $this->model->search($this->keywords, $this->page)
        ];
        $data['number'] = $this->getNumber($data);
        $data['disable'] = $this->disableArray($data);

        View::rendertemplate('header', $data);
        View::render('list/articleList', $data);
        View::rendertemplate('footer', $data);
    }

    public function wapList() {
        $this->getParameters();

        $data = [
            'page' => $this->page,
            'keywords' => $this->keywords,
            'articleList' => $this->model->getArticleList($this->keywords, $this->page)
        ];
        $data['number'] = $this->getNumber($data);
        $data['disable'] = $this->disableArray($data);

        View::rendertemplate('header', $data);
        View::render('list/wapList', $data);
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

    /**
     * 返回搜索结果的数量
     * @param $data
     * @return int
     */
    private function getNumber($data) {
        return count($data['articleList']);
    }

    /**
     * 返回翻页按钮的设置
     * @param $data
     * @return array
     */
    private function disableArray($data) {
        $disable = array(
            'last' => false,
            'next' => false,
        );
        if ($data['page'] == 1)
            $disable['last'] = true;

        if ($data['number'] < 10)
            $disable['next'] = true;

        return $disable;
    }
}