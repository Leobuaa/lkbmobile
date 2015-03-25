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

<h4>滚动列表文章标题</h4>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <?php
        foreach ($data['scrollList'] as $article) {
            echo "<div class='swiper-slide'>
                    <a href='/article?id=$article->id'><img src='$article->litpic' /></a>
                  </div>" ;
        }
        ?>
    </div>
    <div class="swiper-pagination"></div>
</div>
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

<script>
    window.onload = function() {
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
    }
</script>