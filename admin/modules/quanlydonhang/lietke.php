<p style="font-size: 20px;">Liệt kê đơn hàng</p>

<?php
  $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:10;
  $current_page = !empty($_GET['page'])?$_GET['page']:1;
  $offset = ($current_page - 1) * $item_per_page;
  $sql_lietke_dh = mysqli_query($mysqli, "SELECT * FROM `cart` ORDER BY cart.cart_date DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
  $totalRecords = mysqli_query($mysqli, "SELECT * FROM `cart`");
  $totalRecords = $totalRecords->num_rows;
  $totalPages = ceil($totalRecords / $item_per_page);
?>

<style>
#pagination {
  margin-top: 15px;
  display: flex;
  flex-direction: row; 
  align-items: center;
  justify-content: center;
  text-align: center;
}
#pagination a {
    color: black;
    text-decoration: none;
    background-color: transparent;
    font-size: 16px;
  margin: 2px;
}

#pagination a.active {
  background-color: #4CAF50;
  color: white;
}

#pagination a:hover:not(.active) {
  background-color: #3498DB;
  border-radius: 15px;
  color: #FFF;
}

.page-item{
    padding: 12px;
    color: #000;
}
.current-page{
    background: #3498DB;
    border-radius: 15px;
    color: #FFF;
}
.nav-button ~ #nav-content-highlight {
  top: 286px;
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
th {
  padding: 15px;
  background: #e5e5ff;
  position: sticky;
  top: 0; 
  box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
}
</style>
<table border="1" width="100%" style="border-collapse: collapse; border-color: #BFD7ED;">
  <tr style="background-color:#e5e5ff;">
  	<th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Ghi chú</th>
    <th>Ngày đặt</th>
    <th>Hình thức thanh toán</th>
    <th>Tình trạng</th>
  	<th>Quản lý</th>
    <th>In</th>
  
  </tr>
  <?php
    $i=(10*$current_page-10);
    while($row = mysqli_fetch_array($sql_lietke_dh)){
      $i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['address'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['phone'] ?></td>
    <td><?php echo $row['note'] ?></td>
    <td><?php echo $row['cart_date'] ?></td>
    <td><?php echo $row['cart_payment'] ?></td>
    <td>
    	<?php if($row['cart_status']==0){
    		echo '<a href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'">Đơn hàng mới</a>';
    	}else{
    		echo '<a style="color: #00cc00">Đã xử lý';
    	}
    	?>
    </td>
   	<td>
   		<a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a> 
   	</td>
    <td>
      <a href="modules/quanlydonhang/indonhang.php?code=<?php echo $row['code_cart'] ?>" target="_blank">In Đơn hàng</a> 
    </td>
   
  </tr>
  <?php
  } 
  ?>
</table>

<?php 
  if ($totalPages!=1){
?>
<div id="pagination">
<?php
$param = "action=quanlydonhang&query=lietke&";
if ($current_page > 3) {
    $first_page = 1;
    ?>
    <a class="page-item" href="?<?=$param?>per_page=<?= $item_per_page ?>&page=<?= $first_page ?>">«</a>
    <?php
}
if ($current_page > 1) {
    $prev_page = $current_page - 1;
    ?>
    <a class="page-item" href="?<?=$param?>per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">‹</a>
<?php }
?>
<?php for ($num = 1; $num <= $totalPages; $num++) { ?>
    <?php if ($num != $current_page) { ?>
        <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
            <a class="page-item" href="?<?=$param?>per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
        <?php } ?>
    <?php } else { ?>
        <strong class="current-page page-item"><?= $num ?></strong>
    <?php } ?>
<?php } ?>
<?php
if ($current_page < $totalPages - 1) {
    $next_page = $current_page + 1;
    ?>
    <a class="page-item" href="?<?=$param?>per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">›</a>
<?php
}
if ($current_page < $totalPages - 3) {
    $end_page = $totalPages;
    ?>
    <a class="page-item" href="?<?=$param?>per_page=<?= $item_per_page ?>&page=<?= $end_page ?>">»</a>
    <?php
}
?>
</div> 
<?php 
  }
?>