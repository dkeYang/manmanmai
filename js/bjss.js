/**
 * Created by Administrator on 2017/7/4.
 */
$(function () {
    function getItems(id) {
        //根据id传入参数，获得每个大标题的下面的列表内容
        $.ajax({
            url:"http://139.199.192.48:9090/api/getcategory",
            data:{
                titleid:Number(id),
            },
            success:function (data) {
                console.log(data);
                var detail = template("mainPage-items",data);
                $("#"+id).after(detail);
            }
        })
    }
    //每个大标题的动态生成
    $.ajax({
        url:"http://139.199.192.48:9090/api/getcategorytitle",
        success:function (backdata) {
            // console.log(backdata);
            var res = template("mainPage",backdata);
            $(".contents-all").append(res);
            for(var i = 0;i<backdata.result.length;i++){
                getItems(backdata.result[i].titleId)
            }
        }
    })
})
$(function () {
    //点击标题栏的a标签，下面的面板展开和关闭.由于标签是动态生成，因此需要绑定给原先就有的父元素，但是要获得这个元素，只能通过e.target来获得。但是e.target是dom对象，因此要用$来转换为jQuery对象
    // var flag =true;
    // $(".contents-all").on("click",$(".content-items .title"),function (e) {
    //     console.log(1);
    //     if(flag){
    //         $(e.target).siblings().css({
    //             display:"flex"
    //         })
    //         $(e.target).parent().siblings().children("ul").css({
    //             display:"none"
    //         })
    //         flag=false;
    //     }else{
    //        $(e.target).siblings().css({
    //             display:"none"
    //         })
    //         flag = true;
    //     }
    // })
    // var flag = true;
    // $(".contents-all").on("click",$(".content-items .title"),function (e) {
    //     if(flag){
    //         $(e.target).removeClass("icon-down").addClass("icon-chevronup").parent().siblings().children("a").removeClass("icon-chevronup").addClass("icon-down");
    //         flag = false;
    //     }else{
    //         $(e.target).removeClass("icon-chevronup").addClass("icon-down")
    //         flag=true;
    //     }
    // })

//点击标题栏的a标签，下面的面板展开和关闭.由于标签是动态生成，因此需要绑定给原先就有的父元素，但是要获得这个元素，可以通过e.target来获得。但是e.target是dom对象，因此要用$来转换为jQuery对象.由于需要判断点击标签的次数，点击其他标签的时候要让展开的标签复原，因此可以使用了toggleClass，给点击的标签切换类名show，然后这样就能比较清楚的记录标签是否有show这个类名。保持show类名的唯一性，从而根据判断是否有这个类名对盒子的隐藏和显示、上下箭头的切换做出调整。
    $(".contents-all").on("click",$(".content-items .title"),function (e) {
       $(e.target).toggleClass("show");//点击的时候判断标签是否有show这个类名
       if($(e.target).hasClass("show")){
           //如果有show这个类名，那么就清除其他的标签的show类名。因为只有一个a标签下面的ul能过展开。
           $(e.target).parent().siblings().children("a").removeClass("show")
           //包含show类名的标签，他的兄弟ul显示，其他a标签的兄弟ul隐藏
           $(".title[class~=show]").siblings().css({
               display:"flex"
           }).parent().siblings().children("ul").css({
               display:"none"
           });
           // 包含show类名的标签移除字体图标中的向下箭头，加上向上箭头的类名
           $(".title[class~=show]").removeClass("icon-down").addClass("icon-chevronup").parent().siblings().children("a").removeClass("icon-chevronup").addClass("icon-down");
       }else{
           //如果没有show类名，那么就标签移除字体图标中的向上箭头，加上向下箭头的类名，兄弟ul隐藏
           $(e.target).removeClass("icon-chevronup").addClass("icon-down").siblings().css({
                           display:"none"
                       })
       }


    })
    $('.sy-foot .dengLu a:nth-child(3)').click(function () {
        $('html,body').animate({scrollTop:0});

    })
})