<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/4
 * Time: 14:35
 */
$id = $_GET;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>慢慢买比价网</title>
    <link rel="stylesheet" href="../../css/bjss-detail.css">
    <link rel="stylesheet" href="../../fonts/bjss-font/iconfont.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico" class="ico">
</head>
<script>
    document.querySelector('html').style.fontSize = window.screen.width / 10 + 'px';
</script>
<body>
<header>
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
    <!--<div class="sy-bd"></div>-->
</header>
    <div class="nav">
        <div class="nav-content">
            <a href="../../index.html">首页&gt;</a>
            <a href="bjss.html">全部分类&gt;</a>
            <a href="javascript:void(0)">电视&gt;</a>
        </div>
        <button class="search">筛选</button>
    </div>
<div class="detail-content">
<!--    <a class="detail-items" href="">-->
<!--        <div class="left">-->
<!--            <img src="" alt="">-->
<!--        </div>-->
<!--        <div class="right">-->
<!--            <p class="detail-items-title">美的(Midea) KFR-35GW/WPAA3 1.5匹 挂壁式变频冷暖空调</p>-->
<!--            <p class="price"><span>￥</span><span>2499</span></p>-->
<!--            <p class="comment"><span>7商城报价</span><span>有12123人评论</span></p>-->
<!--        </div>-->
<!---->
<!--    </a>-->
</div>
<div class="pagediv">
    <button class="previous">上页</button>
    <select name="page" id="page">
<!--        <option value="">1/3</option>-->
<!--        <option value="">2/3</option>-->
<!--        <option value="">3/3</option>-->
    </select>
    <button class="next">下页</button>
    
</div>
    <div class="sy-foot">
<!--        <a href="javascript:void(0)">-->
<!--            <div class="top">-->
<!--                <span>品牌排行</span>-->
<!--                <img src="./images/more.png" alt=""/>-->
<!--            </div>-->
<!--        </a>-->
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
<script src="../../js/bjss-detail.js"></script>
<script type="text/html" id="detail-items">
    {{each result}}
    <a class="detail-items" href="bjss-items.php?index={{$value.productId}}&brandName={{$value.brandName}}&categoryId={{$value.categoryId}}">
        <div class="left">
            {{#$value.productImg}}
        </div>
        <div class="right">
            <p class="detail-items-title">{{$value.productName}}</p>
            <p class="price"><span></span><span>{{$value.productPrice}}</span></p>
            <p class="comment"><span>{{$value.productQuote}}</span><span>{{$value.productCom}}</span></p>
        </div>
    </a>
    {{/each}}
</script>
<script>
//    设置页面详情的ajax内容
    $(function () {
        var pageId=1;
        var totalPage =0;
        var flag = true;
        function pageJump(index) {
            $.ajax({
                url:"http://139.199.192.48:9090/api/getproductlist",
                data:{
                    categoryid:<?php echo $_GET["index"]?>,
                    pageid:index
                },
                success:function (data) {
                    console.log(data);
                   totalPage = Math.ceil(data.totalCount/data.pagesize);//设置总页数
//                    console.log(totalPage);
                    //根据totalPage循环生成下拉选项框option，由于外面点击事件调用函数，因此在函数外部设置一个flag，这段代码执行一次之后flag变为false，以后永远不再执行。
                    if(flag){
                        for(var i =1;i<=totalPage;i++){
//                            option的value与select的值一致时，该选项在最前。
                            $("#page").append($("<option value="+i+">"+i+"/"+totalPage+"</option>"))
                        }
                        flag=false;
                    }
                    var res = template("detail-items",data);
                    $(".detail-content").html(res);
//                    $("#page option:eq("+(index-1)+")").attr("selected","selected").siblings().removeAttr("selected");
                    $("select#page").val(index);
                }
            })
        }

        //        上一页按钮点击时pageId--，执行函数，动态渲染页面
        $(".previous").on("click",function () {
            if(pageId == 1){
                return;
            }
            pageId--;
            console.log(pageId);
            pageJump(pageId);
        })
        //        下一页按钮点击时pageId++，执行函数，动态渲染页面
        $(".next").on("click",function () {
            if(pageId ==totalPage){
                return;
            }
            pageId++;
            pageJump(pageId);
            console.log(pageId);
        })
//        下拉菜单点击时调到相对应的页面
        $("#page").on("change",function (e) {
//            console.log($(e.target).index());
            pageId = $("#page option:selected").index()+1;
            console.log(pageId);
            pageJump(pageId);
        })
        pageJump(pageId);
    })
$(function () {
    $.ajax({
        url:"http://139.199.192.48:9090/api/getcategorybyid",
        data:{
            categoryid:<?php echo $_GET["index"]?>
        },
        success:function (data) {
//            console.log(data);
            // console.log(1);
            // console.log(data.result[0].category);
             $(".nav-content a:last").html(data.result[0].category+"&gt;")
        }
    })
    $('.sy-foot .dengLu a:nth-child(3)').click(function () {
        $('html,body').animate({scrollTop:0});

    })
})
</script>
