<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" class="ico">
    <link rel = "stylesheet" type="text/css" href = "../../fonts/Font Awesome, 为 Bootstrap 而创造的图标字体_files/font-awesome.min.css" / >
    <link rel = "stylesheet" type="text/css" href = "../../css//branddetails.css" / >
</head>
<body>
<!-- header-->
    <div class="sy-header">
        <div class="  logo">
            <a href="../../index.html">
                <img src="../../images/header_logo.png" alt=""/>
            </a>
        </div>
        <div class=" appdown">
            <a href="javascript:viod(0)">
                <img src="../../images/header_app.png" alt=""/>
            </a>
        </div>
    </div>
  <div class="brand-details-container">
    <!--顶部导航-->
        <div class="details-jump">
            <a href="../../index.html">首页</a>
            <a href="./brandindex.php">&gt;&nbsp;品牌大全</a>
            <a href="javascript:void(0)"></a>
        </div>
        <!--分类标题-->
        <div class="details-title"></div>
        <!--排行列表-->
        <div class="details-list">  
        </div>
        <!--销量排行标题-->
         <div class="details-title details-rank"></div>
         <div class="details-sale">
         </div>
         <!--最新评论标题-->
         <div class="details-title details-comment"></div>
         <div class="detials-comment-img">
         </div>
  </div> 
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
</body>
<script type="text/html" id="branddetails">
  {{each result}}
       <a href="javascript:void(0)">
           <div>
               <p><span></span>{{$value.brandName}}</p>
             <p>{{$value.brandInfo}}</p>
           </div>
             <div class="icon-angle-right">
             </div>
          </a>
    {{/each}}
</script>
<script type= "text/html" id="detail-sale">
{{each result}}
 <a  class="details-item" href="../bjss/bjss-items.php?index={{$value.productId}}&brandName={{$value.brandName}}&categoryId={{$value.categoryId}}">

    <div class="details-img">
        {{#$value.productImg}}
    </div>
    <div class="des">
        <p>{{$value.productName}}</p>
        <p><span>{{$value.productPrice}}</span><span>★★★★★</span></p>
        <p>{{$value.productQuote}}&nbsp;&nbsp;&nbsp;{{$value.productCom}}</p>
    </div>
</a>
 {{/each}}
</script>
<script type="text/html" id="comment-item">
    {{each result}}
    <div class="details-img">
        <img src="http://pro.zuyushop.com:8015/ProPic/20153/Thumb/Thumb_2015030014442314218.jpg" width="100" height="100" alt="TCL D43A810 42英寸 高清720P 智能网络LED液晶电视">
        <p>TCL D43A810 42英寸 高清720P 智能网络LED液晶电视</p>
    </div>
    <div class="des"> 
       
       <p><span>{{$value.comName}}:<span>★★★★★</span></span><span>{{$value.comTime}}</span></p>
       <p>{{$value.comContent}}</p>
        <b class="icon-angle-up"></b>
    </div>
    {{/each}}
</script>
<script type="text/javascript" src="../../js/jquery-1.12.2.js"></script>
<script type="text/javascript" src="../../js/template.js"></script>
<script>
    $(function() {
        var id= <?php echo $_GET['index'];?>;
        var type = <?php echo $_GET['type'];?>;
        type = type.replace(/十大品牌/,'');
        $(".details-jump a:last-child").html("&gt;&nbsp;"+type+"哪个牌子好");
        $(".details-title").html(type+"哪个牌子好");
        $(".details-rank").html(type+"产品销量排行");
        $(".details-comment").html(type+"最新评论");
        $("title").html(type+"哪个牌子好");
        $.ajax({
          data: {
              brandtitleid: id,
          },
          url: "http://139.199.192.48:9090/api/getbrand",
          success: function(data) {
              $(".details-list").append(template("branddetails", data));
              for(var i =0; i<10 ; i++){
                $(".details-list a span").eq(i).html(i+1);
              }
              $(".details-list a span:contains('1')").css({
                  'backgroundColor':"#f10e0e",
               });
              $(".details-list a span:contains('2')").css({
                'backgroundColor':"#ff9314",
              });
              $(".details-list a span:contains('3')").css({
                'backgroundColor':"#8adf5b",
              });
              $(".details-list a span:contains('10')").css({
                'backgroundColor':"#c9c9c9",
              });

          }
      });

        $.ajax({
           data:{
               brandtitleid:id,
           },
           url:"http://139.199.192.48:9090/api/getbrandproductlist",
           success: function(data){
               $(".details-sale").append(template("detail-sale",data));
        }
     });
  $.ajax({
           data:{
               productid:id,
           },
           url:"http://139.199.192.48:9090/api/getproductcom",
           success: function(data){
               $(".detials-comment-img").append(template("comment-item",data));
        }
     });
     //   foot 返回顶部
    $('.sy-foot .dengLu a:nth-child(3)').click(function () {
        $('html,body').animate({scrollTop:0});
    })
})
</script>

</html>