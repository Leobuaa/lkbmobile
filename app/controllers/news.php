<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 4/14/15
 * Time: 3:34 PM
 */
namespace controllers;
use models\newsModel;

class News extends \core\controller {

    private $model;
    private $response;

    public function __construct() {
        parent::__construct();
        $this->model = new NewsModel();
        $this->response = array(
            'success' =>  'true',
            'msg' => '',
        );
        header("Content-Type: application/json;charset=UTF-8");
    }

    public function getNewsList() {
        $page = $this->getPara("page");
        $size = $this->getPara("size");
        $recommend = $this->getPara("recommend");

        if ($page == null) $page = 1;
        if ($size == null) $size = 8;
        if ($recommend == null) $recommend = 0;

        $this->response['data'] = $this->model->getNewsList($page, $size, $recommend);

        echo json_encode($this->response);
    }

    public function getNewsDetail() {
        $newsId = $this->getPara("newsId");
        if ($newsId == null) {
            $this->response['success'] = 'false';
            $this->response['msg'] = '缺少参数，无法返回正确的结果';
            $this->response['data'] = '';
        } else {
            $this->response['data'] = $this->model->getNewsDetail($newsId)[0];
        }
        echo json_encode($this->response);
    }

    public function getPara($tag) {
        if (!empty($_GET[$tag]))
            return $_GET[$tag];
        else if (!empty($_POST[$tag]))
            return $_POST[$tag];

        return null;
    }

}