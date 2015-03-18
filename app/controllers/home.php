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
        $data['title'] = 'Test Page';
        $data['test'] = $this->test();
        $data['message'] = 'Hello, this is a test page!';

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
        return $model->getArticles();
    }
}