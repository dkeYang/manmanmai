$(function() {
    // 动态生成品牌列表
    $.ajax({
        url: "http://139.199.192.48:9090/api/getbrandtitle",
        success: function(data) {
            $(".brand-list").append(template("brandindex", data));
        }
    });
    $('.sy-foot .dengLu a:nth-child(3)').click(function() {
        $('html,body').animate({ scrollTop: 0 });
    });
})