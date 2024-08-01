<?php
	$sql_sua_sp = "SELECT * FROM sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
	$query_sua_sp = mysqli_query($mysqli,$sql_sua_sp);
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

:root {
  --select-border: #777;
  --select-focus: blue;
  --select-arrow: var(--select-border);
}

select {
  // A reset of styles, including removing the default dropdown arrow
  appearance: none;
  background-color: transparent;
  border: none;
  padding: 0 1em 0 0;
  margin: 0;
  width: 100%;
  font-family: inherit;
  font-size: inherit;
  cursor: inherit;
  line-height: inherit;
  z-index: 1;
  &::-ms-expand {
    display: none;
  }
  outline: none;
}

.select {
	margin: auto;
  display: grid;
  grid-template-areas: "select";
  align-items: center;
  position: relative;
  select,
  &::after {
    grid-area: select;
  }
  min-width: 15ch;
  max-width: 25ch;
  border: 1px solid var(--select-border);
  border-radius: 0.25em;
  padding: 0.25em 0.5em;
  font-size: 1rem;
  cursor: pointer;
  line-height: 1;
  background-color: #fff;
  background-image: linear-gradient(to top, #f9f9f9, #fff 33%);
}
</style>
<p style="font-size: 20px;">Sửa sản phẩm</p>
<table border="2" width="100%" style="border-collapse: collapse; border-color: #BFD7ED;">
<?php
while($row = mysqli_fetch_array($query_sua_sp)) {
?>
 <form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data">
	  <tr>
	  	<td>Tên sản phẩm</td>
	  	<td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham"></td>
	  </tr>
	   <tr>
	  	<td>Mã sp</td>
	  	<td><input type="text" value="<?php echo $row['masp'] ?>" name="masp"></td>
	  </tr>
	  <tr>
	  	<td>Giá sp</td>
	  	<td><input type="text" value="<?php echo $row['giasp'] ?>" name="giasp"></td>
	  </tr>
	  <tr>
	  	<td>Số lượng</td>
	  	<td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
	  </tr>
	   <tr>
	  	<td>Hình ảnh</td>
	  	<td>
	  		<input type="file" name="hinhanh">
	  		<img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
	  	</td>

	  </tr>
	  <tr>
	  	<td>Tóm tắt</td>
	  	<td><textarea rows="10"  name="tomtat" style="resize: none"><?php echo $row['tomtat'] ?></textarea></td>
	  </tr>
	   <tr>
	  	<td>Nội dung</td>
	  	<td><textarea rows="10"  name="noidung" style="resize: none"><?php echo  $row['noidung'] ?></textarea></td>
	  </tr>
	  <tr>
	    <td>Danh mục sản phẩm</td>
	    <td>
		<div class="select">
	    	<select name="danhmuc">
	    		<?php
	    		$sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc DESC";
	    		$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
	    		while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
	    			if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
	    		?>
	    		<option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
	    		<?php
	    			}else{
	    		?>
	    		<option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
	    		<?php
	    			}
	    		} 
	    		?>
	    	</select>
		</div>
	    </td>
	  </tr>
	  <tr>
	    <td>Tình trạng</td>
	    <td>
		<div class="select">
	    	<select name="tinhtrang">
	    		<?php
	    		if($row['tinhtrang']==1){ 
	    		?>
	    		<option value="1" selected>Kích hoạt</option>
	    		<option value="0">Ẩn</option>
	    		<?php
	    		}else{ 
	    		?>
	    		<option value="1">Kích hoạt</option>
	    		<option value="0" selected>Ẩn</option>
	    		<?php
	    		} 
	    		?>
	    	</select>
		</div>
	    </td>
	  </tr>
	   <tr>
	    <td colspan="2"><input type="submit" name="suasanpham" value="Sửa sản phẩm" id="submit"></td>
	  </tr>
 </form>
 <?php
 } 
 ?>
</table>
<div class="return">
  <a href="index.php?action=quanlysp&query=them"><i class="fas fa-chevron-left"></i>&ensp;Quay lại </a>
</div>