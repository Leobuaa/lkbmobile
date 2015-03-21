<div class="page-header">
    <h1><?php echo $data['title'] ?></h1>
</div>

<p><?php echo $data['message'] ?></p>

<h4>滚动列表文章标题</h4>
<ul>
    <?php
        foreach ($data['scrollList'] as $article) {
            echo "<li>".$article->title."</li>" ;
        }
    ?>
</ul>
<br>

<h4>标签列表</h4>
<ul>
    <?php
    foreach ($data['tags'] as $key => $value) {
        echo "<li>".$value."</li>";
    }
    ?>
</ul>
<br>

<h4>推荐列表文章标题</h4>
<ul>
    <?php
    foreach ($data['wapList'] as $article) {
        echo "<li>".$article->title."</li>" ;
    }
    ?>
</ul>