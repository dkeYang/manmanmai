/**
 * Created by Administrator on 2017/7/4.
 */


$(function () {

   //���� ����ѡ��
   $('.sy-nav ul ').on( 'click','li' ,function () {
       if($(this).index()==7){
           if($(this).nextAll().hasClass('hidden')){
               $(this).nextAll().removeClass('hidden');
           }else{
               $(this).nextAll().addClass('hidden');
           }
       }
   })

//   foot ���ض���
    $('.sy-foot .dengLu a:nth-child(3)').click(function () {
        $('html,body').animate({scrollTop:0});

    })

//    ��������������(�˵���)
//    $.ajax({
//       url:'http://139.199.192.48:9090/api/getindexmenu',
//            //data:{}    ,
//        success: function (data) {
//            //console.log(data)
//          var result1 = template('sy-nav',data)
//            //console.log(result1);
//            $('.sy-nav ul:first-child').append(result1)
//        }
//    })


//    �������������ۿ�����
    $.ajax({
        url:'http://139.199.192.48:9090/api/getmoneyctrl',
        success: function (data) {
            var result2 = template('sy-main',data)
            //console.log(result2);
            $('.sy-main .container ul').append(result2)
        }
    })
})
