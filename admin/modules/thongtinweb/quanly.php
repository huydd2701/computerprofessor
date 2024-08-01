<div class="div" id="div">
<p style="font-size: 20px;">Quản lý thông tin website</p>
<?php
	$sql_lh = "SELECT * FROM lienhe WHERE id=1";
	$query_lh = mysqli_query($mysqli,$sql_lh);
?>
<style>
.nav-button ~ #nav-content-highlight {
    top: 340px;
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
<table border="2" width="100%" style="border-collapse: collapse; border-color: #BFD7ED;">
	<?php
	 	while($dong = mysqli_fetch_array($query_lh)){
	?>
<form method="POST" action="modules/thongtinweb/xuly.php?id=<?php echo $dong['id'] ?>" enctype="multipart/form-data">  
	<tr>
		<td>Thông tin liên hệ</td>
	  	<td><textarea rows="10"  name="thongtinlienhe" style="resize: none"><?php echo $dong['thongtinlienhe'] ?></textarea></td>
	</tr>	  
	<tr>
	    <td colspan="2"><input type="submit" name="submitlienhe" value="Cập nhật" id="submit"></td>
	</tr>
	<?php 
		}
	?>
</form>
</table>
</div>