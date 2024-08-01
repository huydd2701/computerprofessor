<p style="font-size: 20px;">Xem đơn hàng</p>
<?php
	$code = $_GET['code'];
	$sql_lietke_dh = "SELECT * FROM cart_details,sanpham WHERE cart_details.id_sanpham=sanpham.id_sanpham AND cart_details.code_cart='".$code."' ORDER BY cart_details.id_cart_details DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
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
<table border="1" width="100%" style="border-collapse: collapse; border-color: #BFD7ED;">
  <tr style="background-color:#e5e5ff;">
  	<th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Mã sp</th>
    <th>Hình ảnh</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
  </tr>
  <?php
  $i = 0;
  $tongtien = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  	$thanhtien = $row['giasp']*$row['soluongmua'];
  	$tongtien += $thanhtien ;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><?php echo $row['masp'] ?></td>
    <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
   	
  </tr>
  <?php
  } 
  ?>
  <tr>
  	<td colspan="8">
   		<p style="text-align: right;margin-right:40px;font-weight:bold;">Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
   	</td> 
  </tr>
</table>
<div class="return">
  <a href="index.php?action=quanlydonhang&query=lietke"><i class="fas fa-chevron-left"></i>&ensp;Quay lại đơn hàng </a>
</div>
</li>
</div>