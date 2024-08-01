<?php
	$sql_sua_danhmucsp = "SELECT * FROM danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
	$query_sua_danhmucsp = mysqli_query($mysqli,$sql_sua_danhmucsp);
?>
<style>
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
<p style="font-size: 20px;">Sửa danh mục sản phẩm</p>
<table border="2" width="50%" style="border-collapse: collapse; border-color: #BFD7ED;">
 <form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
 	<?php
 	while($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
 	?>
	  <tr>
	  	<td>Tên danh mục</td>
	  	<td><input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc"></td>
	  </tr>
	  <tr>
	    <td>Thứ tự</td>
	    <td><input type="text" value="<?php echo $dong['thutudanhmuc'] ?>" name="thutudanhmuc"></td>
	  </tr>
	   <tr>
	    <td colspan="2"><input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm" id="submit"></td>
	  </tr>
	  <?php
	  } 
	  ?>
 </form>
</table>
<div class="return">
  <a href="index.php?action=quanlydanhmucsanpham&query=them"><i class="fas fa-chevron-left"></i>&ensp;Quay lại </a>
</div>