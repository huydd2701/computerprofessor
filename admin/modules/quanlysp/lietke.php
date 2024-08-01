<style>
.nav-button ~ #nav-content-highlight {
  top: 124px;
}
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #18283B;
  background-color: #f1f1f1;
  width: 98%;
  border-radius: 10px;
  margin-left: 10px;
  position: sticky;
  top: 10px; 
  z-index: 1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
  border-radius: 10px;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
  border-radius: 10px;
}

/* Style the tab content */
.tabcontent {
  display: none;
  border-top: none;
  margin-top: 5px;
}
  td{
    width: 500px;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: 25px;
    -webkit-line-clamp: 3;
    height: 75px;
    -webkit-box-orient: vertical;
    text-align: center;
  }
</style>
<p style='font-size: 20px;'>Liệt kê danh mục sản phẩm</p>

<?php 
  $sql_lietke_sp = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc=danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
	$query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);

	$sql_lietke_sp1 = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc=danhmuc.id_danhmuc and sanpham.tinhtrang = 1 ORDER BY id_sanpham DESC";
	$query_lietke_sp1 = mysqli_query($mysqli,$sql_lietke_sp1);

  $sql_lietke_sp2 = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc=danhmuc.id_danhmuc and sanpham.tinhtrang = 0 ORDER BY id_sanpham DESC";
	$query_lietke_sp2 = mysqli_query($mysqli,$sql_lietke_sp2);

  $sql_lietke_sp3 = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc=danhmuc.id_danhmuc and sanpham.soluong = 0 ORDER BY id_sanpham DESC";
	$query_lietke_sp3 = mysqli_query($mysqli,$sql_lietke_sp3);
?>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, '1')">Tất cả sản phẩm</button>
  <button class="tablinks" onclick="openCity(event, '2')">Sản phẩm hiển thị</button>
  <button class="tablinks" onclick="openCity(event, '3')">Sản phẩm đã ẩn</button>
  <button class="tablinks" onclick="openCity(event, '4')">Sản phẩm hết hàng</button>
  <button class="tablinks" onclick="openCity(event, '5')">Thêm sản phẩm</button>
</div>

<div id="1" class="tabcontent" style="display: flex; margin-top: 20px;">
<table border="2" width="100%" style="border-collapse: collapse; border-color: #BFD7ED;">
  <tr>
  	<th>Id</th>
    <th>Tên sản phẩm</th>
    <th>Mã sp</th>
    <th>Hình ảnh</th>
    <th>Giá sp</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    <th>Tóm tắt</th>
    <th>Nội dung</th>
    <th>Trạng thái</th>
  	<th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_sp)){
  	$i++;
  ?>
  <tr style='color=red;'>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><?php echo $row['masp'] ?></td>
    <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['giasp'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <p><td class="resize-sp"><?php echo $row['noidung'] ?></td></p>
    <td><?php if($row['tinhtrang']==1){
        echo 'Kích hoạt';
      }else{
        echo 'Ẩn';
      } 
      ?>
      
    </td>
   	<td>
    <div class="button2">
    <span>
      <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>  
    </span>
    </div>
    <div class="button1">
    <span>
      <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xoá</a> 
    </span>
    </div>
   	</td>
  </tr>
  <?php
  }
  ?>
</table>
</div>

<div id="2" class="tabcontent">
<table border="2" width="100%" style="border-collapse: collapse; border-color: #BFD7ED;">
  <tr>
  	<th>Id</th>
    <th>Tên sản phẩm</th>
    <th>Mã sp</th>
    <th>Hình ảnh</th>
    <th>Giá sp</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    <th>Tóm tắt</th>
    <th>Nội dung</th>
    <th>Trạng thái</th>
  	<th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row1 = mysqli_fetch_array($query_lietke_sp1)){
  	$i++;
  ?>
  <tr style='color=red;'>
  	<td><?php echo $i ?></td>
    <td><?php echo $row1['tensanpham'] ?></td>
    <td><?php echo $row1['masp'] ?></td>
    <td><img src="modules/quanlysp/uploads/<?php echo $row1['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row1['giasp'] ?></td>
    <td><?php echo $row1['soluong'] ?></td>
    <td><?php echo $row1['tendanhmuc'] ?></td>
    <td><?php echo $row1['tomtat'] ?></td>
    <p><td class="resize-sp"><?php echo $row1['noidung'] ?></td></p>
    <td><?php if($row1['tinhtrang']==1){
        echo 'Kích hoạt';
      }else{
        echo 'Ẩn';
      } 
      ?>
      
    </td>
   	<td>
    <div class="button2">
    <span>
      <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row1['id_sanpham'] ?>">Sửa</a>  
    </span>
    </div>
    <div class="button1">
    <span>
      <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row1['id_sanpham'] ?>">Xoá</a> 
    </span>
    </div>
   	</td>
  </tr>
  <?php
  }
  ?>
</table>
</div>

<div id="3" class="tabcontent">
<table border="2" width="100%" style="border-collapse: collapse; border-color: #BFD7ED;">
  <tr>
  	<th>Id</th>
    <th>Tên sản phẩm   </th>
    <th>Mã sp</th>
    <th>Hình ảnh</th>
    <th>Giá sp</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    <th>Tóm tắt</th>
    <th>Nội dung</th>
    <th>Trạng thái</th>
  	<th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row2 = mysqli_fetch_array($query_lietke_sp2)){
  	$i++;
  ?>
  <tr style='color=red;'>
  	<td><?php echo $i ?></td>
    <td><?php echo $row2['tensanpham'] ?></td>
    <td><?php echo $row2['masp'] ?></td>
    <td><img src="modules/quanlysp/uploads/<?php echo $row2['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row2['giasp'] ?></td>
    <td><?php echo $row2['soluong'] ?></td>
    <td><?php echo $row2['tendanhmuc'] ?></td>
    <td><?php echo $row2['tomtat'] ?></td>
    <p><td class="resize-sp"><?php echo $row2['noidung'] ?></td></p>
    <td><?php if($row2['tinhtrang']==1){
        echo 'Kích hoạt';
      }else{
        echo 'Ẩn';
      } 
      ?>
      
    </td>
   	<td>
    <div class="button2">
    <span>
      <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row2['id_sanpham'] ?>">Sửa</a>  
    </span>
    </div>
    <div class="button1">
    <span>
      <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row2['id_sanpham'] ?>">Xoá</a> 
    </span>
    </div>
   	</td>
  </tr>
  <?php
  }
  ?>
</table>
</div>

<div id="4" class="tabcontent">
<table border="2" width="100%" style="border-collapse: collapse; border-color: #BFD7ED;">
  <tr>
  	<th>Id</th>
    <th>Tên sản phẩm</th>
    <th>Mã sp</th>
    <th>Hình ảnh</th>
    <th>Giá sp</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    <th>Tóm tắt</th>
    <th>Nội dung</th>
    <th>Trạng thái</th>
  	<th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row3 = mysqli_fetch_array($query_lietke_sp3)){
  	$i++;
  ?>
  <tr style='color=red;'>
  	<td><?php echo $i ?></td>
    <td><?php echo $row3['tensanpham'] ?></td>
    <td><?php echo $row3['masp'] ?></td>
    <td><img src="modules/quanlysp/uploads/<?php echo $row3['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row3['giasp'] ?></td>
    <td><?php echo $row3['soluong'] ?></td>
    <td><?php echo $row3['tendanhmuc'] ?></td>
    <td><?php echo $row3['tomtat'] ?></td>
    <p><td class="resize-sp"><?php echo $row3['noidung'] ?></td></p>
    <td><?php if($row3['tinhtrang']==1){
        echo 'Kích hoạt';
      }else{
        echo 'Ẩn';
      } 
      ?>
      
    </td>
   	<td>
    <div class="button2">
    <span>
      <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row3['id_sanpham'] ?>">Sửa</a>  
    </span>
    </div>
    <div class="button1">
    <span>
      <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row3['id_sanpham'] ?>">Xoá</a> 
    </span>
    </div>
   	</td>
  </tr>
  <?php
  }
  ?>
</table>
</div>

<div id="5" class="tabcontent">
  <?php
    include("modules/quanlysp/them.php");
  ?>
</div>



<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";

  const element = document.getElementById(cityName);
  element.scrollIntoView(alignToTop);
}
</script>