<?php
	$sql_lietke_danhmucbv = "SELECT * FROM danhmucbaiviet ORDER BY thutu DESC";
	$query_lietke_danhmucbv = mysqli_query($mysqli,$sql_lietke_danhmucbv);
?>
<style>
.nav-button ~ #nav-content-highlight {
  top: 178px;
}
/* Style the tab */
.tab {
  margin-top: 10px;
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

<div class="tab">
  <button class="tablinks" onclick="openCity(event, '1')">Danh mục bài viết</button>
  <button class="tablinks" onclick="openCity(event, '2')">Thêm danh mục</button>
</div>

<div id="1" class="tabcontent" style="display: block; margin-top: 20px;">
<p style="font-size: 20px;">Liệt kê danh mục bài viết</p>
<table border="2" width="100%" style="border-collapse: collapse; border-color: #BFD7ED;">
  <tr>
  	<th>Id</th>
    <th>Tên danh mục</th>
  	<th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_danhmucbv)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
   	<td>
     <div class="button2">
    <span>
      <a href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>">Sửa</a> 
    </span>
    </div>
    <div class="button1">
    <span>
      <a href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>">Xoá</a> 
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
<?php
  include("modules/quanlydanhmucbaiviet/them.php");
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