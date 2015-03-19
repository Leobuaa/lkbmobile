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

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'title' => 'Test Page',
            'test' => $this->test(),
            'message' => 'Hello, this is a test page!'
        ];

        // 测试页面, 返回结果是一维数组时使用testArray, 结果是二维数组时候使用testArray2
        View::rendertemplate('header', $data);
        View::render('home/testArray2', $data);
        View::rendertemplate('footer', $data);
    }

    /**
     * 测试函数, 用于测试接口
     * @return array
     */
    public function test() {
        $model = new Article();
        $keywords = "食欲不振";
        $page = 1;
        if (isset($_GET['keywords']))
            $keywords = $_GET['keywords'];
        if (isset($_GET['page']))
            $page = $_GET['page'];
        return $model->search($keywords, $page);
    }
}