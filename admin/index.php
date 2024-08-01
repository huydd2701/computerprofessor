<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý website</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'><link rel="stylesheet" href="./style.css">
  <link rel="website icon" type ="png" href="https://cdn-icons-png.flaticon.com/512/7542/7542190.png">
	<link rel="stylesheet" type="text/css" href="css/styleadmin.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>
<?php
 session_start();
 if(!isset($_SESSION['dangnhap'])){
 	header('Location:login.php');
 } 
?>
  <?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
      unset($_SESSION['dangnhap']);
      header('Location:login.php');
    }
  ?>
<body>
<div class="wrapper" id="wrapper">
<?php 
		include("config/config.php");
    include("../front/trang/main/backtotop.php");
		include("modules/main.php");
?>
	</div>
<div id="nav-bar">
  <input id="nav-toggle" type="checkbox"/>
  <div id="nav-header"><a id="nav-title">&ensp;<i class="fas fa-users-cog"></i> Quản lý</a>
    <label for="nav-toggle" onclick="openNav()"><span id="nav-toggle-burger"></span></label>
    <hr/>
  </div>
  <div id="nav-content">
    <div class="nav-button"><i class="fas fa-chart-line"></i></i><a href="index.php"><span> Thống kê </span></a></div>
    <hr/>
    <div class="nav-button"><i class="fas fa-th-list"></i><a href="index.php?action=quanlydanhmucsanpham&query=them"><span> Danh mục sản phẩm </span></a></div>
    <div class="nav-button"><i class="fas fa-desktop"></i><a href="index.php?action=quanlysp&query=them"><span> Sản phẩm </span></a></div>
    <div class="nav-button"><i class="fas fa-paste"></i><a href="index.php?action=quanlydanhmucbaiviet&query=them"><span> Danh mục bài viết</span></a></div>
    <div class="nav-button"><i class="fas fa-images"></i><a href="index.php?action=quanlybaiviet&query=them"><span> Bài viết </span></a></div>
    <hr/>
    <div class="nav-button"><i class="fas fa-tasks"></i><a href="index.php?action=quanlydonhang&query=lietke"><span> Đơn hàng</span></a></div>
    <div class="nav-button"><i class="fas fa-laptop-code"></i><a href="index.php?action=quanlyweb&query=capnhat"><span> Thông tin trang web </span></a></div>
    <div id="nav-content-highlight"></div>
  </div>
  <input id="nav-footer-toggle" type="checkbox"/>
  <div id="nav-footer">
    <div id="nav-footer-heading">
      <div id="nav-footer-avatar"><img src="https://cdn-icons-png.flaticon.com/512/2102/2102633.png"/></div>
      <div id="nav-footer-titlebox"><a id="nav-footer-title" href="#"><?php if(isset($_SESSION['dangnhap'])){echo $_SESSION['dangnhap'];}?></a><span id="nav-footer-subtitle">Admin</span></div>
      <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
    </div>
    <div id="nav-footer-content">
      <Lorem>
      <a id="nav-footer-content-a" href="index.php?dangxuat=1"> Đăng xuất </a>
      </Lorem>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script>
		CKEDITOR.replace('thongtinlienhe');
        CKEDITOR.replace('tomtat');
        CKEDITOR.replace('noidung');
    </script>
    <script type="text/javascript">
   	$(document).ready(function(){
   		thongke();
	    var char = new Morris.Area({
		
		  element: 'chart',
		
		  xkey: 'date',
		 
		  ykeys: ['date','order','sales','quantity'],
		
		  labels: ['Đơn hàng','Số lượng đơn hàng','Doanh thu','Số lượng sản phẩm']
		});

		$('.select-date').change(function(){
            var thoigian = $(this).val();
            if(thoigian=='7ngay'){
                var text = '7 ngày qua';
            }else if(thoigian=='28ngay'){
                var text = '28 ngày qua';
            }else if(thoigian=='90ngay'){
                var text = '90 ngày qua';
            }else{
                var text = '365 ngày qua';
            }
            $('#text-date').text(text);
             $.ajax({
                    url:"modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    data:{thoigian:thoigian},
                    success:function(data)
                    {
                        char.setData(data);
                        $('#text-date').text(text);
                    }   
                });
        })
		 function thongke(){
                var text = '7 ngày qua';
                $('#text-date').text(text);
                $.ajax({
                    url:"modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    success:function(data)
                    {
                        char.setData(data);
                        $('#text-date').text(text);
                    }   
                });
            }
	});
    </script>

<script>
const button = document.getElementById('nav-toggle');

button.addEventListener('click', _ => {
  document.getElementById('wrapper').classList.toggle('wrapper');
})
</script>
</body>
</html>
