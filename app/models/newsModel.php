<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 4/14/15
 * Time: 3:34 PM
 */
namespace models;

class NewsModel extends \core\model {

    public function __construct() {
        parent::__construct();
    }

    public function getNewsList($page, $size, $recommend) {
        if ($recommend == 0) {
            $orderStatement = " ORDER BY id DESC";
            $limitStatement = " LIMIT ".($size*($page - 1)).", ".$size;
            return $this->_db->select("SELECT id as newsId, title as newsTitle, pubdate as newsTime, description as newsIntro
                                   FROM dede_archives
                                   WHERE typeid in (SELECT id
                                   FROM dede_arctype
                                   WHERE reid in (1, 2, 240, 242) or id = 244)".$orderStatement.$limitStatement);
        } else {
            return $this->_db->select("SELECT id as newsId, title as newsTitle, pubdate as newsTime, description as newsIntro
                                       FROM dede_archives
                                       WHERE flag LIKE '%s%'AND typeid in (SELECT id
                                       FROM dede_arctype
                                       WHERE reid in (1, 2, 240, 242) or id = 244) ORDER BY id DESC LIMIT 0, 1");
        }
    }

    public function getNewsDetail($id) {

    }
}