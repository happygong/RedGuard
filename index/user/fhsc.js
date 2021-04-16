 $("#submit").click(function () {
        $.ajax({
            type: "POST",
            url: "../ajax.php",
            dataType: "json",
            data: $('#form_set').serialize(),
            success: function (data) {
              if (data.code==1) {
                   swal({
                title: "缩短成功！",
    html:
    '您的短链接:</br> ' +
    '<a href='+data.url+' target="_blank">'+data.url+'</a>' +
    '<br>'+ 
    '<img src="http://www.orangephoenix.net/api/qrcode.php?text='+data.url+'&size=155" alt="乐公防红，右击图片下载">',
    
                //text: '111',
                     buttonsStyling: false,
        confirmButtonClass: "btn btn-success"
                //type: "success",
                //confirmButtonClass: "btn btn-confirm mt-2"
  })
            
                } else {
                    swal({
                title: "生成失败！",
                text: data.msg,
               buttonsStyling: false,
        confirmButtonClass: "btn btn-danger",
                       type: "error"
                //confirmButtonClass: "btn btn-confirm mt-2"
            });
                }
            }
            
        })
    });
     