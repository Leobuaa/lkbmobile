<!--css-->
<style type="text/css">

</style>

<h4>搜索列表文章标题</h4>
<ul>
    <?php
    foreach ($data['articleList'] as $article) {
        echo "<li>".$article->title."</li>" ;
    }
    ?>
</ul>
<br>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
        <div class="input-group">
            <input id="searchText" type="text" class="form-control" placeholder="请输入关键词">
            <span class="input-group-btn">
                <button id="searchButton" class="btn btn-success" type="button">搜索</button>
            </span>
        </div>
    </div>
</div>

<!--js-->
<script>
    $("#searchButton").click(function() {
        
    });
</script>