<style type="text/css">
    .swiper-container {
        width: 300px;
        height: 225px;
    }

    img {
        width: 300px !important;
        height: 225px !important;
    }
</style>

<div class="page-header">
    <h1><?php echo $data['title'] ?></h1>
</div>

<p><?php echo $data['message'] ?></p>

<h4>文章详情</h4>
<ul>
    <?php
    foreach ($data['article'] as $article) {
        foreach ($article as $key => $value) {
            echo "<li>".$key.":".$value."</li>";
        }
    }
    ?>
</ul>
<br>

<h4>相关文章</h4>
<ul>
    <?php
    foreach ($data['relatedArticles'] as $article) {
        foreach ($article as $key => $value) {
            echo "<li>".$key.":".$value."</li>";
        }
    }
    ?>
</ul>