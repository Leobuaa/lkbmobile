<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 3/18/15
 * Time: 3:14 PM
 */
namespace models;

class Article extends \core\model {

    public function __construct() {
        parent::__construct();
    }

    public function test() {
        return $this->_db->select("SELECT * FROM dede_archives LIMIT 0, 1");
    }

    /**
     * 返回显示在首页上的八个标签
     *
     * @return array
     */
    public function getTags() {
        $configSet = $this->_db->select("SELECT * FROM dede_configSet LIMIT 0, 1");
        $string = $configSet[0]->param1;
        $tags = explode(',', $string);
        return $tags;
    }

    public function getArticles() {
        return $this->_db->select("SELECT id,title,pubdate,litpic,description,writer FROM
        dede_archives WHERE channel=1 AND arcrank = 0 AND typeid IN (SELECT id FROM dede_arctype
        WHERE topid=1) ORDER BY id DESC LIMIT 0, 10");
    }
}