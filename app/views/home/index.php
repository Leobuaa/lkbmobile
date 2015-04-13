<style type="text/css">
    .swiper-container {
        width: 100%;
    }

    #page-header {
        padding: 8px 0;
        background-color: #e2f5e3;
    }

    #search {
        padding: 0 15px;
    }

    #scroll {
        padding: 0;
    }

    .header {
        background-color: #e2f5e3;
        color: #008000;
    }

    .header h5 {
        text-align: right;
    }

    #tag {
        margin-top: 10px;
    }

    #tag li {
        padding: 0 !important;
        margin-bottom: 10px;
    }

    #tag li a {
        display: block;
        width: 60px;
        height: 60px;
        border-radius: 20%;
        margin-left: auto;
        margin-right: auto;
        text-decoration: none;
        font-size: 1.8em;
        color: #ffffff;
    }

    #tag ul {
        padding: 0;
        list-style: none;
    }

    .a-2 {
        padding: 17px 11px;
    }

    .a-3 {
        padding: 5px 11px;
    }

    .a-4 {
        padding: 5px 11px;
    }

    .bc-0 {
        background-color: #ea477f;
    }
    .bc-1 {
        background-color: #fd7354;
    }
    .bc-2 {
        background-color: #43a8e2;
    }
    .bc-3 {
        background-color: #fcb60e;
    }
    .bc-4 {
        background-color: #907dc0;
    }
    .bc-5 {
        background-color: #62be98;
    }
    .bc-6 {
        background-color: #ec9147;
    }
    .bc-7 {
        background-color: #c37cd0;
    }

    .logo {
        padding-top: 2px;
    }

    .scroll-title {
        position: absolute;
        bottom: 20px;
        right: 20px;
        z-index: 10;
        color: #ffffff;
    }

    .header-title {
        border-left: solid green;
    }

    .tag-hidden {
        display: none !important;
    }

    .tag-show {
        display: block !important;
    }

    .article-item {
        border-bottom: 1px solid #e2f5e3;
        margin:0 1px;
    }

    .article-img {
        margin: 10px 0;
        padding: 0;
    }

    .article-word {
        padding-right: 0;
    }

    .description {
        text-decoration: none !important;
        font-size: 1.3em;
        color: #000000;
    }

    .zy-img {
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 0 10px !important;
    }
    .zy-img img{
        display: block;
        margin-left:auto;
        margin-right:auto;
        border-radius:4px;
        width:100%;
        height:auto;
        border:1px solid #eee;
    }

    .btn-test {
        display: block;
        height:40px;
        background: #29ab01;
        margin-top:10px;
        margin-bottom: 10px;
        border-radius: 4px;
        color:#fff;
        font-size: 15px;
        text-align: center;
        padding-top: 10px;
    }

    .foot-info {
        text-align: center;
        font-size: 14px;
        margin-top:10px;
        color:#666;
    }
</style>

<!--显示logo和返回主页按钮-->
<div id="page-header" class="row">
    <div class="col-xs-4 logo">
        <a href="<?php echo DIR;?>home">
            <img id="logo" src="<?php echo DIR;?>images/logo-2.png" width="90px" height="24px" alt="logo" />
        </a>
    </div>
    <div id="search" class="col-xs-8">
        <div class="input-group">
            <input id="searchText" type="text" class="form-control" placeholder="请输入关键词">
            <span class="input-group-btn">
                <button id="searchButton" class="btn btn-success" type="button">
                    <span class="glyphicon glyphicon-search" aria-hidden="true" aria-label="search"></span>
                </button>
            </span>
        </div>
    </div>
</div>

<!--显示滚动的文章列表-->
<div class="row">
    <div id="scroll" class="col-xs-12">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                foreach ($data['scrollList'] as $article) {
                    $href = DIR. "article?id=$article->id";
                    echo "<div class='swiper-slide'>
                    <a href='$href'>
                        <img src='$article->litpic!300x180' width='100%'/>
                    </a>
                    <h4 class='scroll-title'>$article->title</h4>
                  </div>" ;
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>

<!--健康字典标题栏-->
<div class="row header" id="health-header">
    <div class="col-xs-4 header-title">
        <h4>
            健康字典
        </h4>
    </div>
    <div class="col-xs-3 col-xs-offset-5">
        <h5 id="tag-more">
            更多
        </h5>
        <h5 id="tag-collapse" class="tag-hidden">
            收起
        </h5>
    </div>
</div>

<!--显示健康字典的标签-->
<div id="tag" class="row">
    <div class="col-xs-12">
        <ul>
            <?php
                foreach($data['tags'] as $key => $value) {

                    $bc = $key % 8;  // 背景颜色的种类, 总共有8个
                    $hiddenFlag = $key>=8 ? 'tag-hidden' : ' ';  // 一开始并不显示后8个标签
                    $tagLength = strlen($value) / 3; // 判断标签的长度，使用不同的css样式，一个中文字符占3个字符长度
                    $href = DIR. "search?keywords=$value";

                    echo "<li class='col-xs-3'><a href='$href' class='a-$tagLength bc-$bc $hiddenFlag'><p>". $value ."</p></a></li>";

                }
            ?>
        </ul>
    </div>
</div>

<!--显示中医体质-->
<div class="row header">
    <div class="col-xs-4 header-title">
        <h4>中医体质</h4>
    </div>
</div>
<div class="row">
    <div class="col-xs-4 zy-img">
        <a href="<?php echo DIR;?>search?keywords=平和质"><img src="images/平和质.png"></a>
    </div>
    <div class="col-xs-4 zy-img">
        <a href="<?php echo DIR;?>search?keywords=气虚质"><img src="images/气虚质.png"></a>
    </div>
    <div class="col-xs-4 zy-img">
        <a href="<?php echo DIR;?>search?keywords=气郁质"><img src="images/气郁质.png"></a>
    </div>
    <div class="col-xs-4 zy-img">
        <a href="<?php echo DIR;?>search?keywords=阳虚质"><img src="images/阳虚质.png"></a>
    </div>
    <div class="col-xs-4 zy-img">
        <a href="<?php echo DIR;?>search?keywords=阴虚质"><img src="images/阴虚质.png"></a>
    </div>
    <div class="col-xs-4 zy-img">
        <a href="<?php echo DIR;?>search?keywords=湿热质"><img src="images/湿热质.png"></a>
    </div>
    <div class="col-xs-4 zy-img">
        <a href="<?php echo DIR;?>search?keywords=血瘀质"><img src="images/血瘀质.png"></a>
    </div>
    <div class="col-xs-4 zy-img">
        <a href="<?php echo DIR;?>search?keywords=痰湿质"><img src="images/痰湿质.png"></a>
    </div>
    <div class="col-xs-4 zy-img">
        <a href="<?php echo DIR;?>search?keywords=特禀质"><img src="images/特禀质.png"></a>
    </div>
</div>
<div class="row">
    <a href="http://www.lekangba.com/templets/lkbweixin/ceshi_demo.html" class="col-xs-10 col-xs-offset-1 btn-test">还不知道自己的体质? 快来测测吧</a>
</div>

<!--显示精品咨询标题栏-->
<div class="row header">
    <div class="col-xs-4 header-title">
        <h4>
            精品咨询
        </h4>
    </div>
    <div class="col-xs-3 col-xs-offset-5">
        <h5 id="wapMore">
            更多
        </h5>
    </div>
</div>

<!--显示精品咨询的文章列表-->
<?php
    foreach ($data['wapList'] as $article) {
        $description = $article->description;
        $description = mb_substr($description, 0, 30, 'utf-8');
        $href = DIR. "article?id=$article->id";
        echo "<div class='row article-item'>
                <div class='col-xs-5 article-img'>
                    <a href='$href'>
                        <img src='$article->litpic!120x80' width='100%' height='100%' />
                    </a>
                </div>
                <div class='col-xs-7 article-word'>
                    <div class='row'>
                        <div class='col-xs-12'>
                            <a href='$href'>
                                <h4>
                                    $article->title
                                </h4>
                            </a>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-xs-12'>
                            <a href='$href' class='description'>
                                <p>$description ...</p>
                            </a>
                        </div>
                    </div>
                </div>
              </div>";
    }
?>

<footer class="row">
    <div class="col-xs-12">
        <p class="foot-info">© 2015 乐康吧 京ICP备12017187号</p>
    </div>
</footer>

<script>
    window.onload = function() {
        var dir = "<?php echo DIR; ?>";
        $(document).ready(function () {
            //initialize swiper when document ready
            var mySwiper = new Swiper ('.swiper-container', {
                // Optional parameters
                pagination: '.swiper-pagination',
                paginationClickable: true,
                direction: 'horizontal',
                loop: true,
                autoplay: 2500,
                autoplayDisableOnInteraction: false
            });
        });

        $("#searchButton").click(function() {
            var keywords = $("#searchText").val();
            location.href = dir + "search?keywords=" + keywords;
        });

        $("#tag-more").click(function() {
            $("a.tag-hidden").toggleClass("tag-show");
            $("#tag-more").toggleClass("tag-hidden");
            $("#tag-collapse").toggleClass("tag-hidden");

            $("html,body").animate({scrollTop:$("#health-header").offset().top},400);
        });

        $("#tag-collapse").click(function() {
            $("a.tag-show").toggleClass("tag-show");
            $("#tag-more").toggleClass("tag-hidden");
            $("#tag-collapse").toggleClass("tag-hidden");
        });

        $("#wapMore").click(function() {
            location.href = dir + "list?keywords=wap";
        });
    }
</script>
