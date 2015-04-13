<style type="text/css">

    #page-header{
        padding: 10px;
        background-color: #e2f5e3;
    }

    #title {
        padding-bottom: 9px;
        margin: 0px 0 20px;
        border-bottom: 1px solid #eee;
    }

    #logo {
        padding-left: 20%;
        width: 108px;
        height: 22px;
    }

    a:link {
        text-decoration: none;
    }
    a:visited {
        text-decoration: none;
    }
    a:hover {
        text-decoration: none;
    }
    a:active {
        text-decoration: none;
    }


    #article img{
        width: 90% !important;
        height: auto !important;
    }
</style>


<div id="page-header" class="row">
    <div class="col-xs-2">
        <a href="<?php echo DIR;?>home">
            <img id="back" src="<?php echo DIR;?>images/fangzi.png" alt="back" />
        </a>
    </div>
    <div class="col-xs-5 col-xs-offset-1">
        <a href="<?php echo DIR;?>home">
            <img id="logo" src="<?php echo DIR;?>images/logo-2.png" alt="logo" />
        </a>
    </div>
</div>

<div id="title">
<h3><?php echo $data['article'][0]->title ?></h3>

<small>
    <?php
        echo $data['article'][0]->writer;
        echo " |";
        echo $data['article'][0]->pubdate;
    ?>
</small>
</div>



<div id="article">
    <?php


    $body=$data['article'][0]->body;
        //将文章中图片替换为又拍手机版
        $body = preg_replace('/(<[^<]*img).+(src="?.+(jpg|gif|bmp|bnp|png))[^>]*>/i','$1 $2">',$body);
        $body = preg_replace('/(<img).+(src="?http:\/\/img1.+(jpg|gif|bmp|bnp|png))[^>]*>/i','$1 $2!wapa">',$body);
        echo $body;
    ?>
</div>

<div style="background-color:#e2f5e3">
    <div style="padding-left:15px;padding-top:3px">
        <h4>相关文章</h4>
    </div>
    <div style="padding-bottom:1px">
        <ul >
            <?php
            foreach ($data['relatedArticles'] as $article) {
                $idRela=$article->id;
                $href = DIR. "article?id=$idRela";
                echo "<li style='padding-bottom: 5px;'><a href='$href'>".$article->title."</a></li>";
                }
            ?>
        </ul>
    </div>
</div>

