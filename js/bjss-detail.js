/**
 * Created by Administrator on 2017/7/4.
 */
//三级菜单的跳转ajax
// $(function () {
//     $.ajax({
//         url:"http://139.199.192.48:9090/api/getcategorybyid",
//         data:{
//             categoryid:1
//         },
//         success:function (data) {
//             console.log(data);
//             // console.log(1);
//             // console.log(data.result[0].category);
//             // $(".nav-content a:last").html(data.result[0].category+"&gt;")
//         }
//     })
// })

//动态生成商品详情的ajax
// $(function () {
//     $.ajax({
//         url:"http://139.199.192.48:9090/api/getproductlist",
//         data:{
//             categoryid:1,
//             pageid:1
//         },
//         success:function (data) {
//             console.log(data);
//         }
//     })
// })