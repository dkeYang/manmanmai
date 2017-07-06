<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
  <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
  <title>国内折扣详情页面</title>
  <!-- 使用js 来修改 rem的的大小 -->
  <script>
    // 这里除以的份数 取决于 我们在设计图中转换时 除以的分数 这里以10来计算会方便一些
    document.querySelector('html').style.fontSize = window.screen.width / 10 + 'px';
  </script>
  <!-- Bootstrap -->
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/syj_index.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="info_layout">
    <!--顶部通栏-->
    <header>
      <div class="sy-header">
        <div class="logo">
          <a href="gnzk_index.html"> < </a>
        </div>
        <div class="gnzk">
          <p>国内折扣</p>
        </div>
        <div class=" appdown">
          <a href="javascript:viod(0)">
                <img src="../../images/header_app.png" alt=""/>
            </a>
        </div>
      </div>
    </header>

    <!--主要内容部分-->
    <div class="main-info-body">

      <!--body结束-->
    </div>

    <!--底部跳转区-->
    <div class="info-footer">

        <div class="sy-foot">
        <a href="javascript:void(0)">
          <div class="top">
            <span>品牌排行</span>
            <img src="../../images/more.png" alt="" />
          </div>
        </a>
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

    </div>
    <!--layout结束-->
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../../js/jquery-1.12.2.js"></script>
  <!--<script src="js/zepto/zepto.js"></script>-->
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
  <!--引入模板引擎-->
  <script src="../../js/template.js"></script>
</body>

</html>
<!--获取传过来的ID，并存起来-->
<?php echo '<a  class="echo" href="'.$_GET['productId'].'"></a>' ?>

<!--坑位-->
<!--挖坑填坑-->
<script type="text/html" id="gnzk_info_template">
  {{each result}}
  <div class="info1">
    <h3 class="title">{{$value.productName}}</h3>

    <h4>{{$value.productPrice}}</h4>

    <div class="user-info">
      <span class="mall">{{$value.productFrom}}</span>
      <span class="addtime">{{$value.productTime}}</span>
      <span class="author">{{$value.productTips}}</span>
    </div>

    <div class="content-info">
      <p>{{$value.productInfo}}</p>
      <div>{{#$value.productImg}}</div>
    </div>
    <!--</div>-->
    <!--前往购买-->
    <div class="golink">
      <a href="javascript:void(0);">前往购买</a>
    </div>

    <!--评论区-->
    <div class="info2">{{#$value.productComment}}</div>

  </div>
  <!--页脚点击跳转-->
  <div class="jump_link">
    <div class="link_list">
      <a href="../../index.html">首页 <span> > </span>  </a>
      <a href="../shengqian/sheng-index.html">超值推荐 <span> > </span>  </a>
      <span class="info-texted" data-placement="top"  title="{{$value.productName}}">{{$value.productName}}</span>
      
    </div>
  </div>

  {{/each}}

</script>


<script>
  $.ajax({
    type: 'get',
    url: 'http://139.199.192.48:9090/api/getdiscountproduct',
    data: {
      productid:$(".echo").attr("href")
      // productid: 2
    },
    success: function (data) {
      console.log(data);
      var gnzk_info_template = template('gnzk_info_template', data);
      $('.main-info-body').html(gnzk_info_template);
    }
  })
</script>
<script>
  //   foot 返回顶部
  $('.sy-foot .dengLu a:nth-child(3)').click(function () {
    $('html,body').animate({
      scrollTop: 0
    });
  })
</script>