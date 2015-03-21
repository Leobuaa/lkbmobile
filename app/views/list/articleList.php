<div class="page-header">
    <h1><?php echo $data['title'] ?></h1>
</div>

<p><?php echo $data['message'] ?></p>

<h4>搜索列表文章标题</h4>
<ul>
    <?php
    foreach ($data['articleList'] as $article) {
        echo "<li>".$article->title."</li>" ;
    }
    ?>
</ul>
<br>