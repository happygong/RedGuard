 <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                       乐公网络信息技术有限公司 &copy; 2020 - orangephoenix.net
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="http://f.bqzmz.com">关于我们</a>
                            <a href="http://f.bqzmz.com/user/cjwt.php">帮助</a>
                            <a href="http://f.bqzmz.com/user/">联系我们</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->


        <!-- App js -->
        <script src="js/vendor.min.js"></script>
        <script src="js/app.min.js"></script>
        <script src="js/vendor/sweetalert2.min.js"></script>
        <!-- Plugins js -->
        <script src="js/vendor/Chart.bundle.js"></script>
        <script src="js/vendor/jquery.sparkline.min.js"></script>
        <script src="js/vendor/jquery.knob.min.js"></script>
         <script src="assets/layui/layui.js"></script>
        <script src="js/pages/dashboard.init.js"></script>
<script>
  layui.use(['laypage', 'layer'], function(){
var laypage = layui.laypage,
layer = layui.layer; 
laypage.render(
  {
    elem: 'demo7',
    count: <?php echo ($numrows!=''? $numrows:'0');?>,
    first: false,
    last: false,
    layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'],
    groups: 1, //只显示 1 个连续页码
    first: false, //不显示首页
    last: false, //不显示尾页
    curr: <?php echo ($page!=''? $page:'0');?> ,
    jump: function(obj,first){
      if(first!=true){
            var currentPage = obj.curr;
            window.location.href ="?page="+currentPage+"&pagesize="+obj.limit+"<?php echo $link.$pag;?>";
       }
   }
});
});
   $(".delete").click(function() {
  var id = $(this).attr("pid");
     Swal.fire({
  title: '删除确认',
        text: "您确定删除吗？",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        confirmButtonText: '是的哦',
        cancelButtonText: '点错了',
        buttonsStyling: false
}).then((result) => {
           if (result.value) {
    $.ajax({
      type: "POST",
      url: "?delete",
      data: {
        id: id
      },
      dataType: 'json',
      success: function(data) {
        if (data.code == 1) {
          swal({
                title: "删除成功！",
                text: data.msg,
                type: "success",
                confirmButtonClass: "btn btn-confirm mt-2"
            }).then(function() {
                   window.location.reload();
                  });
        } else {
            swal({
                title: "删除失败！",
                text: data.msg,
                type: "error",
                confirmButtonClass: "btn btn-confirm mt-2"
            });
        }
      }
    })
           }
     })
   })
    
  

</script>


