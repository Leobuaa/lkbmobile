<style type="text/css">

    #header {
        padding: 10px;
        background-color: #e2f5e3;
    }

    #page-header{
        padding-bottom: 9px;
        margin: 0px 0 20px;
        border-bottom: 1px solid #eee;
    }



    #logo {
        width: 108px;
        height: 22px;
    }

    #title {
        margin-top: 5px;
        margin-bottom: 5px;
        font-size: 28px;
        font: ;
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
</style>



<div id="page-header">
    <div id="header" class="row">
        <div class="col-xs-2">
            <a href="/home">
                <img id="back" src="/images/fangzi.png" alt="back" />
            </a>
        </div>
        <div class="col-xs-2"></div>
        <div class="col-xs-8 ">
            <a href="/home">
                <img id="logo" src="/images/logo-2.png" alt="logo" />
            </a>
        </div>
    </div>


    <h2><?php echo $data['article'][0]->title ?></h2>

    <small>
        <?php
        echo $data['article'][0]->writer;
        echo " |";
        echo $data['article'][0]->pubdate
        ?>
    </small>

</div>






<?php


echo $data['article'][0]->body
?>

<div style="background-color:#e2f5e3">
    <div>
        <h4>相关文章</h4>
    </div>
    <div>
        <ul >
            <?php
            foreach ($data['relatedArticles'] as $article) {
                $idRela=$article->id;
                echo "<li style='padding-bottom: 5px;'><a href='article?id=".$idRela."'>".$article->title."</a></li>";
            }
            ?>
        </ul>
    </div>
</div>

