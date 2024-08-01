<?php
	$sql_sua_danhmucbv = "SELECT * FROM danhmucbaiviet WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";
	$query_sua_danhmucbv = mysqli_query($mysqli,$sql_sua_danhmucbv);
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
 <form method="POST" action="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>">
 	<?php
 	while($dong = mysqli_fetch_array($query_sua_danhmucbv)) {
 	?>
	  <tr>
	  	<td>Tên danh mục</td>
	  	<td><input type="text" value="<?php echo $dong['tendanhmuc_baiviet'] ?>" name="tendanhmucbaiviet"></td>
	  </tr>
	  <tr>
	    <td>Thứ tự</td>
	    <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
	  </tr>
	   <tr>
	    <td colspan="2"><input type="submit" name="suadanhmucbaiviet" value="Sửa danh mục bài viết" id="submit"></td>
	  </tr>
	  <?php
	  } 
	  ?>

 </form>
</table>
<div class="return">
  <a href="index.php?action=quanlydanhmucbaiviet&query=them"><i class="fas fa-chevron-left"></i>&ensp;Quay lại </a>
</div>