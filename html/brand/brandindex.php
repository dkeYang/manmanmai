<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <title>慢慢买比价网——手机版</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" class="ico">
    <link rel="stylesheet" type="text/css" href="../../fonts/Font Awesome, 为 Bootstrap 而创造的图标字体_files/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../../css/brandindex.css" />
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

    <div class="brand-container">
        <!--顶部导航-->
        <div class="yq-jump">
            <a href="../../index.html">首页</a>
            <a href="javascript:void(0)">&gt;&nbsp;品牌大全</a>
            <!--<a href="javascript:void(0)"></a>-->
        </div>
        <!--热门品牌排行-->
        <div class="yq-hot-brand">热门品牌排行</div>
        <!--十大品牌列表-->
        <div class="brand-list">
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
<script type="text/javascript" src="../../js/template.js"></script>
<script type="text/javascript" src="../../js/jquery-1.12.2.js"></script>
<script type="text/javascript" src="../../js/brandindex.js"></script>
<script type="text/html" id="brandindex">
    {{each result}}
    <a class="brand-item" href="./branddetails.php?index={{$value.brandTitleId}}&type='{{$value.brandTitle}}'">
        <p>{{$value.brandTitle}}</p>
        <span class="icon-angle-down"></span>
    </a>
    {{/each}}
</script>

</html>