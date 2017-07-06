<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4
 * Time: 21:06
 *
 */
$id = $_GET["index"];
$brandName = $_GET["brandName"];
$categoryId = $_GET["categoryId"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>慢慢买比价网</title>
    <link rel="stylesheet" href="../../css/bjss-items.css">
    <link rel="stylesheet" href="../../fonts/bjss-font/iconfont.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico" class="ico">
</head>
<script>
    document.querySelector('html').style.fontSize = window.screen.width / 10 + 'px';
</script>
<body>
<div class="sy-header">
    <div class="  logo">
        <a href="../../index.html">
            <img src="../../images/header_logo.png" alt=""/>
        </a>
    </div>
    <div class=" appdown">
        <a href="javascript:void(0)">
            <img src="../../images/header_app.png" alt=""/>
        </a>
    </div>

</div>

<div class="sy-search">
    <input type="search" placeholder="请输入你想比价的商品">
    <a href="javascript:void(0)">
        搜索
    </a>
</div>
<div class="nav">
    <div class="nav-content">
        <a href="../../index.html">首页&gt;</a>
        <a href="detail.php?index=<?php echo $categoryId ?>">&gt;</a>
        <a href="javascript:void(0)"><?php echo $brandName ?>&gt;</a>
    </div>
    <button class="search">筛选</button>
</div>
<main>
    <div class="content"></div>
    <!--    <h3 class="item-title">TCL D43A810 42英寸 高清720P 智能网络LED液晶电视</h3>-->
    <!--    <img src="" alt="">-->
    <!--    <div class="compare">-->
    <!--        <span>比价购买</span>-->
    <!--        <span>产品参数</span>-->
    <!--        <span>优选评价</span>-->
    <!--    </div>-->
    <p class="anno">*实际价格以各网站列出的实际售价为准，我们提供的价格可能有数小时至数日的延迟。</p>
</main>
<div class="commentArea">
    <!--    <h3>网友评价</h3>-->
    <!--    <div class="comment-info">-->
    <!--        <span>b***r</span>-->
    <!--        <span>2016-10-1</span>-->
    <!--    </div>-->
    <!--    <div class="source">购买自：京东商城</div>-->
    <!--    <div class="comment-content">-->
    <!--        1.接口:机器有一排接口是朝下的，但手基本不可能伸进去。HDMI3支持2160p/60hz，另两个HDMI最高支持2160p/30hz。-->
    <!--    </div>-->
    <!--    <button>查看更多评价</button>-->
</div>
<div class="sy-foot">

    <div class="dengLu">
        <a href="javascript:void(0)">登录</a>
        <a href="javascript:void(0)">注册</a>
        <a href="javascript:void(0)"><i class="icon-top iconfont"></i>&nbsp;返回顶部</a>
    </div>
    <div class="xiaZ">
        <P><a href="javascript:void(0)">手机APP下载</a>慢慢买手机版 <span>-- 掌上比价平台</span></P>
        <P><a href="javascript:void(0)">m.manmanbuy.com</a></P>
    </div>


</div>
</body>
</html>
<script src="../../js/jquery-1.12.2.js"></script>
<script src="../../js/template.js"></script>
<script src="../../lib/zepto/zepto.js"></script>
<script src="../../lib/zepto/ajax.js"></script>
<script src="../../lib/zepto/callbacks.js"></script>
<script src="../../lib/zepto/event.js"></script>
<script src="../../lib/zepto/touch.js"></script>
<script type="text/html" id="item">
    {{each result}}
    <h3 class="item-title">{{$value.productName}}</h3>
    {{#$value.productImg}}
    <div class="compare">
        <span>比价购买</span>
        <span>产品参数</span>
        <span>优选评价</span>
    </div>
    {{#$value.bjShop}}
    {{/each}}
</script>
<script type="text/html" id="comment">
    <h3>网友评价</h3>
    {{each result}}
    <div class="comment-info">
        <span>{{$value.comName}}</span>
        <span>{{$value.comTime}}</span>
    </div>
    <div class="source">{{$value.comFrom}}</div>
    <div class="comment-content">
        {{$value.comContent}}
    </div>
    {{/each}}
    <button>查看更多评价</button>
</script>
<script>
    //    根据id生成上面的商品详情页面
    $(function () {
        $.ajax({
            url: "http://139.199.192.48:9090/api/getproduct",
            data: {
                productid:<?php echo $id?>
            },
            success: function (data) {
                console.log(data);
                var res = template("item", data)
                $(".content").append(res);

            }
        })
    })
    //    根据id生成下面的评论页面
    $(function () {
        $.ajax({
            url: "http://139.199.192.48:9090/api/getproductcom",
            data: {
                productid:<?php echo $id?>
            },
            success: function (data) {
//            console.log(data);
                var res = template("comment", data)
                $(".commentArea").append(res);

            }
        })
    })
    //    三级目录各种跳转
    $(function () {
        $.ajax({
            url: "http://139.199.192.48:9090/api/getcategorybyid",
            data: {
                categoryid:<?php echo $categoryId?>
            },
            success: function (data) {
                console.log(data.result[0].category);
                $(".nav-content a:eq(1)").html(data.result[0].category + "&gt;")
            }

        })
        $('.sy-foot .dengLu a:nth-child(3)').click(function () {
            $('html,body').animate({scrollTop: 0});

        })
    })
</script>