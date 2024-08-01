<style>
.nav-button ~ #nav-content-highlight {
  top: 232px;
}
/* Style the tab */
.tab {
  margin-top: 10px;
  overflow: hidden;
  border: 1px solid #18283B;
  width: 98%;
  background-color: #f1f1f1;
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
  margin-top: 10px;
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

<?php
	$sql_lietke_bv = "SELECT * FROM baiviet,danhmucbaiviet WHERE baiviet.id_danhmuc=danhmucbaiviet.id_baiviet ORDER BY baiviet.id DESC";
	$query_lietke_bv = mysqli_query($mysqli,$sql_lietke_bv);

  $sql_lietke_bv1 = "SELECT * FROM baiviet,danhmucbaiviet WHERE baiviet.id_danhmuc=danhmucbaiviet.id_baiviet and baiviet.tinhtrang = 1 ORDER BY baiviet.id DESC";
	$query_lietke_bv1 = mysqli_query($mysqli,$sql_lietke_bv1);

  $sql_lietke_bv2 = "SELECT * FROM baiviet,danhmucbaiviet WHERE baiviet.id_danhmuc=danhmucbaiviet.id_baiviet and baiviet.tinhtrang = 0 ORDER BY baiviet.id DESC";
	$query_lietke_bv2 = mysqli_query($mysqli,$sql_lietke_bv2);
?>

<p style='font-size: 20px;'>Liệt kê danh mục bài viết</p>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, '1')">Tất cả bài viết</button>
  <button class="tablinks" onclick="openCity(event, '2')">Bài viết hiển thị</button>
  <button class="tablinks" onclick="openCity(event, '3')">Bài viết đã ẩn</button>
  <button class="tablinks" onclick="openCity(event, '4')">Thêm bài viết</button>
</div>

<div id="1" class="tabcontent" style="display: flex; margin-top: 20px;">
<table border="2" width="100%" style="border-collapse: collapse; border-color: #BFD7ED;">
  <tr>
  	<th>Id</th>
    <th>Tên bài viết</th>
    <th>Hình ảnh</th>
    <th>Danh mục</th>
    <th>Tóm tắt</th>
    <th>Nội dung</th>
    <th>Trạng thái</th>
  	<th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_bv)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['tenbaiviet'] ?></td>
    <td><img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="200px"></td>
    <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
    <div class="resize-bv">
    <td><?php echo $row['tomtat'] ?></td>
    <p><td class="resize-bv"><?php echo $row['noidung'] ?></td></p>
    </div>
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
      <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id'] ?>">Sửa</a> 
    </span>
    </div>
    <div class="button1">
    <span>
      <a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>">Xoá</a>
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
    <th>Tên bài viết</th>
    <th>Hình ảnh</th>
    <th>Danh mục</th>
    <th>Tóm tắt</th>
    <th>Nội dung</th>
    <th>Trạng thái</th>
  	<th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row1 = mysqli_fetch_array($query_lietke_bv1)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row1['tenbaiviet'] ?></td>
    <td><img src="modules/quanlybaiviet/uploads/<?php echo $row1['hinhanh'] ?>" width="200px"></td>
    <td><?php echo $row1['tendanhmuc_baiviet'] ?></td>
    <div class="resize-bv">
    <td><?php echo $row1['tomtat'] ?></td>
    <p><td class="resize-bv"><?php echo $row1['noidung'] ?></td></p>
    </div>
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
      <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row1['id'] ?>">Sửa</a> 
    </span>
    </div>
    <div class="button1">
    <span>
      <a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row1['id'] ?>">Xoá</a>
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
    <th>Tên bài viết</th>
    <th>Hình ảnh</th>
    <th>Danh mục</th>
    <th>Tóm tắt</th>
    <th>Nội dung</th>
    <th>Trạng thái</th>
  	<th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row2 = mysqli_fetch_array($query_lietke_bv2)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row2['tenbaiviet'] ?></td>
    <td><img src="modules/quanlybaiviet/uploads/<?php echo $row2['hinhanh'] ?>" width="200px"></td>
    <td><?php echo $row2['tendanhmuc_baiviet'] ?></td>
    <div class="resize-bv">
    <td><?php echo $row2['tomtat'] ?></td>
    <p><td class="resize-bv"><?php echo $row2['noidung'] ?></td></p>
    </div>
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
      <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row2['id'] ?>">Sửa</a> 
    </span>
    </div>
    <div class="button1">
    <span>
      <a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row2['id'] ?>">Xoá</a>
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
  <?php
    include("modules/quanlybaiviet/them.php");
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