<div class="page-header">
    <h1><?php echo $data['title'] ?></h1>
</div>

<p><?php echo $data['message'] ?></p>

<h4>文章详情</h4>
<ul>
    <?php
    foreach ($data['article'] as $article) {
        foreach ($article as $key => $value) {
            echo "<li>".$value."</li>";
        }
    }
    ?>
</ul>
<br>