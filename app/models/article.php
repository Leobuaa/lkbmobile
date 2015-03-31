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

    /**
     * 返回特定类型的文章列表, $type为1表示返回带有滚动属性的普通文章, $type为2表示返回带有手机属性的普通文章
     *
     * @param $type
     * @return array
     */
    public function getArticles($type) {
        if ($type == 1)
            return $this->_db->select("SELECT id, title, pubdate, litpic, description, writer
                                       FROM dede_archives
                                       WHERE flag LIKE '%s%'AND typeid in (SELECT id FROM dede_arctype WHERE topid
                                       = '1' or topid = '2' or topid = '233') ORDER BY id DESC LIMIT 0, 10");
        else
            return $this->_db->select("SELECT id, title, pubdate, litpic, description, writer
                                       FROM dede_archives
                                       WHERE flag LIKE '%w%'AND typeid in (SELECT id FROM dede_arctype WHERE topid
                                       = '1' or topid = '2' or topid = '233') ORDER BY id DESC LIMIT 0, 5");
    }


    /**
     * 搜索特定的文章
     *
     * @param $keywords
     * @param $page
     * @return array
     */
    public function search($keywords, $page) {
        if ($keywords == "")
            $keywords = "痛风";
        $keywordArray = explode(' ', $keywords);
        $likeStatementArray = array();
        foreach($keywordArray as $keyword) {
            $likeStatementArray[] = " keywords LIKE '%$keyword%'";
        }
        $likeStatement = implode(" OR", $likeStatementArray);
        $orderStatement = " ORDER BY id DESC";
        $limitStatement = " LIMIT ".(10*($page - 1)).", 10";
        return $this->_db->select("SELECT id, title, pubdate, litpic, description, writer
                                   FROM dede_archives
                                   WHERE ".$likeStatement.$orderStatement.$limitStatement);
    }

    /**
     * 通过id获取特定文章的详细内容
     *
     * @param $id
     * @return array
     */
    public function getDetailArticle($id) {
        return $this->_db->select("SELECT arc.id, tp.typename, tp.ishidden, arc.typeid, arc.title, arc.arcrank,
                                  arc.pubdate, arc.writer, arc.click, addon.body, tp.topid, arc.mid, arc.keywords
                                  FROM dede_archives arc
                                  LEFT JOIN dede_arctype tp ON tp.id=arc.typeid
                                  LEFT JOIN dede_addonarticle addon ON addon.aid=arc.id
                                  WHERE arc.id='$id'");
    }

    /**
     * 通过id获取相关文章的列表
     *
     * @param $id
     * @return array
     */
    public function getRelatedArticle($id) {
        $article = $this->getDetailArticle($id);
        $keywords = $article[0]->keywords;
        $keywordArray = explode(',', $keywords);
        $likeStatementArray = array();
        foreach($keywordArray as $keyword) {
            $likeStatementArray[] = " CONCAT(keywords, ' ', title) LIKE '%$keyword%'";
        }
        $likeStatement = implode(" OR", $likeStatementArray);
        $orderStatement = " ORDER BY pubdate LIMIT 0, 3";
        return $this->_db->select("SELECT id, keywords, title
                                  FROM dede_archives WHERE id<>$id AND ".$likeStatement.$orderStatement);
    }

    /**
     * 通过类别及页码返回文章的列表
     *
     * @param $type
     * @param $page
     * @return array
     */
    public function getArticleList($type, $page) {
        $limitStatement = " LIMIT ".(10*($page - 1)).", 10";
        if ($type == "wap")
            return $this->_db->select("SELECT id, title, pubdate, litpic, description, writer
                                       FROM dede_archives
                                       WHERE flag LIKE '%w%'AND typeid in (SELECT id FROM dede_arctype WHERE topid
                                       = '1' or topid = '2' or topid = '233') ORDER BY id DESC".$limitStatement);
    }
}