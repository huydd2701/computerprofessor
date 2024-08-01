<?php
include('../../config/config.php');

$tenloaisp = $_POST['tendanhmuc'];
$thutudanhmuc = $_POST['thutudanhmuc'];
if(isset($_POST['themdanhmuc'])){
	//them
	$sql_them = "INSERT INTO danhmuc(tendanhmuc,thutudanhmuc) VALUE('".$tenloaisp."','".$thutudanhmuc."')";
	mysqli_query($mysqli,$sql_them);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}elseif(isset($_POST['suadanhmuc'])){
	//sua
	$sql_update = "UPDATE danhmuc SET tendanhmuc='".$tenloaisp."',thutudanhmuc='".$thutudanhmuc."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
	mysqli_query($mysqli,$sql_update);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}else{

	$id=$_GET['iddanhmuc'];
	$sql_xoa = "DELETE FROM danhmuc WHERE id_danhmuc='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}

?>