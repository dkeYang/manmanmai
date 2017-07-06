<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>肯德基</title>
    <!--引入css文件夹-->
    <link rel="stylesheet" href="../../css/youhuijuan-2.css">
    <!--引入bootstrap文件夹-->
    <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.min.css">
    <!--移动端视口-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <script>
        // 这里除以的份数 取决于 我们在设计图中转换时 除以的分数 这里以10来计算会方便一些
        document.querySelector('html').style.fontSize = window.screen.width / 10 + 'px';
    </script>
    <!--引入js代码-->
    <script src="../../js/jquery-1.12.2.js"></script>

    <!--引入jQuery-->
    <script src="../../lib/bootstrap/js/jquery-1.12.4.min.js"></script>
    <!--模板引擎-->
    <script src="../../js/template-web.js"></script>

<!--    引入swiper-->
    <script src="../../lib/swiper/swiper.min.js"> </script>

    <link rel="stylesheet" href="../../lib/swiper/swiper.min.css">

 <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico" class="ico" />
</head>
<body>
<!--顶部的优惠卷begin-->
<div class="top">
    <div class="top_left">
        <a href="xyj.html" class="glyphicon glyphicon-menu-left"></a>
    </div>
    <?php  echo "<h2 class='yhj' _id=".$_GET['id'].">".$_GET["couponid"]."优惠券</h2>" ?>

    <div class="top_right">
        <a href="#">
            <img src="../../images/header_app.png" alt="">
        </a>
    </div>
</div>
<!--顶部的优惠卷end-->

<!--优惠begin-->
<p class="sjyh">--点餐前出示手机中的优惠券，即可享受优惠--</p>
<!--优惠end-->

<!--商品列表begin-->
    <div id="ctl00_ContentBody_quanlist" class="juan-box">
         <ul>

        </ul>
    </div>
<!--商品列表end-->
<!--底部 -->
<div class="sy-foot">
    <div class="dengLu">
        <a href="javascript:void(0)">登录</a>
        <a href="javascript:void(0)">注册</a>
        <a href="javascript:void(0)"><i class=" icon-arrow-up"></i>&nbsp;返回顶部</a>
    </div>
    <div class="xiaZ">
        <P><a href="javascript:void(0)">手机APP下载</a>慢慢买手机版 <span>-- 掌上比价平台</span></P>
        <P><a href="javascript:void(0)">m.manmanbuy.com</a></P>
    </div>
</div>
<!--底部-->

<!--遮罩层结构 begin-->
<div id="shade">
<!--     swiper插件-->

    <div class="swiper-container">
        <div class="swiper-wrapper">

        </div>
        <!-- 箭头-->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>
    <!--    swiper插件-->
</div>
<!--遮罩层结构 end-->
</body>
</html>
<!--定义模板 begin-->
<script type="text/html" id="singleTemp">
    {{each result}}
  <li>
      <a href="javascript:void(0)" title=" 两人小食组 香辣鸡翅2块+黄金鸡块5块+薯条(中)+原味圣代(草莓酱/巧克力酱) 2017年7月凭肯德基优惠券">
      <div class="pic">
          {{#$value.couponProductImg}}
     </div>
   <div class="info">
   <div class="tit">
       <h3>{{$value.couponProductName}}</h3>
       <h2>{{$value.couponProductPrice}}</h2>
   </div>
       {{$value.couponProductTime}}
       </div>
    </a>
</li>
    {{/each}}
</script>
<!--定义的模板-->

<!--自己的js-->
<script>
    $(function (){
        $.ajax({
            url:"http://139.199.192.48:9090/api/getcouponproduct",
            data:{
                couponid:$(".yhj").attr("_id"),
            },
            success: function (data){
                // 调用模板引擎
                var result = template('singleTemp',data);
                $('.juan-box ul').append(result);
                var $lis= $(".juan-box li");
                for(var i=0;i<$lis.length;i++){
                    var src=$lis.eq(i).find("img").attr("src");
                    $(".swiper-wrapper").append('<div class="swiper-slide"><img src="'+src+'" alt=""></div>')
                }

          }
        })
   });

    $('.sy-foot .dengLu a:nth-child(3)').click(function(){
        $('html,body').animate({scrollTop:0});
    })

    $("#shade").css('display','none');
    var index=0;
    $(".juan-box ul").on("click","li",
        function (){
//            console.log(this);
            index=$(this).index();
            console.log(index);
            $("#shade").fadeIn(500);
            console.log($(this).find("img").attr("src"));
            $(".swiper-slide-active ").eq(index).find("img").attr("src",$(this).find("img").attr("src"));
            console.log($(".swiper-slide").eq(index).find("img").attr("src"));

        });
    $("#shade").on("click",
        function (){
            $("#shade").fadeOut(1);
        });
//    箭头样式
   $(".swiper-button-next").click(function (e){

       e.stopPropagation();
   })

    $(".swiper-button-prev").click(function (e){
        e.stopPropagation();
    })

</script>
<!--插件js-->
<script>
 window.onload=function () {
     var swiper = new Swiper('.swiper-container', {
         pagination: '.swiper-pagination',
         paginationClickable:'.swiper-pagination',
         nextButton: '.swiper-button-next',
         prevButton: '.swiper-button-prev',
         spaceBetween: 30,
//         mode: 'horizontal',
//         pagination: '.swiper-pagination',
         loop: true,
         observer: true,//修改swiper自己或子元素时，自动初始化swiper
         observeParents: true//修改swiper的父元素时，自动初始化swiper
     });
 }
</script>