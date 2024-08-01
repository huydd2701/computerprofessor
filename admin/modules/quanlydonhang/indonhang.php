<?php	
	session_start();
	require('../../../front/tfpdf/tfpdf.php');
	require('../../config/config.php');
	
	$pdf = new tFPDF();
	$pdf->AddPage("0");
	// $pdf->SetFont('Arial','B',16);
	// Add a Unicode font (uses UTF-8)
	$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
	$pdf->SetFont('DejaVu','',14);
	
	$pdf->SetFillColor(193,229,252);
	//set header 

	$code = $_GET['code'];
	$sql_lietke_dh = "SELECT * FROM cart_details,sanpham WHERE cart_details.id_sanpham=sanpham.id_sanpham AND cart_details.code_cart='".$code."' ORDER BY cart_details.id_cart_details DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);

	$sql_lietke_date = "SELECT * FROM cart WHERE code_cart='".$code."' LIMIT 1";
	$query_lietke_date = mysqli_query($mysqli,$sql_lietke_date);

	$sql_lietke_date1 = "SELECT * FROM cart WHERE code_cart='".$code."' LIMIT 1";
	$query_lietke_date1 = mysqli_query($mysqli,$sql_lietke_date1);

	while($row3 = mysqli_fetch_array($query_lietke_date1)){
		 $id_khachhang = $row3['id_khachhang'];
	}

	$sql_lietke_dl = "SELECT * FROM cart WHERE code_cart='".$code."' LIMIT 1";
	$query_lietke_dl = mysqli_query($mysqli,$sql_lietke_dl);

	$fill=false;
	$pdf->Image('../../../front/img/logo.png', 20, 10, -500);
	$pdf->cell(70);
	$pdf->Write(20,'PROFESSOR COMPUTER - SHOP GAMING GEAR HN');
	$pdf->Ln(10);
	$pdf->cell(70);
	$pdf->Write(20,'Địa chỉ: 207 Giải Phóng, Đồng Tâm, Hai Bà Trưng, Hà Nội, Việt Nam');
	$pdf->Ln(10);
	$pdf->cell(70);
	$pdf->Write(20,'Website: www.professorcomputer.com | Fanpage: fb.com/professorcomputervnhn');
	$pdf->Ln(10);
	$pdf->cell(70);
	$pdf->Write(20,'Hotline: 1800 6976');
	$pdf->Ln(10);
	$pdf->cell(8);
	$pdf->Write(20,'Professor Computer');	
	$pdf->Ln(15);
	$pdf->cell(100);
	$pdf->Write(20,'PHIẾU MUA HÀNG');
	$pdf->Ln(20);
	while($row2 = mysqli_fetch_array($query_lietke_date)){

	$pdf->cell(1);
	$pdf->Cell(10,10,"Mã đơn hàng: "); 
		$pdf->cell(22);
		$pdf->Cell(10,10,$row2['code_cart'],$fill); 

	$pdf->Ln(10);
	$pdf->cell(1);
	$pdf->Cell(10,10,"Thời gian đặt hàng: ");
		$pdf->cell(35);
		$pdf->Cell(10,10,$row2['cart_date'],$fill); 
	}	 

	while($row1 = mysqli_fetch_array($query_lietke_dl)){

	$pdf->Ln(10);
	$pdf->cell(1);
	$pdf->Cell(10,10,"Tên khách hàng: "); 
		$pdf->cell(29);
		$pdf->Cell(10,10,$row1['name'],$fill); 

	$pdf->Ln(10);
	$pdf->cell(1);
	$pdf->Cell(10,10,"Địa chỉ: "); 
		$pdf->cell(9);
		$pdf->Cell(10,10,$row1['address'],$fill); 

	//$pdf->cell(68);
	//$pdf->Cell(10,10,",");
	//$pdf->cell(-7);
	//$pdf->Cell(10,10,$row1['tinhthanh'],$fill); 
	}	

	$pdf->Ln(20);
	$pdf->cell(1);
	$pdf->Cell(10,10,"Danh sách sản phẩm: "); 
	$pdf->Ln(10);
	$width_cell=array(15,35,80,30,50,60);

	$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã đơn hàng',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Giá',1,0,'C',true);
	$pdf->Cell($width_cell[5],10,'Tổng tiền',1,1,'C',true); 
	$pdf->SetFillColor(235,236,236);
	$fill=false;
	$i = 0;
	$t1=0;
	$t2=0;
	while($row = mysqli_fetch_array($query_lietke_dh)){
		$a = $row['soluongmua'];
		$b = $row['giasp'];
		$i++;
	$pdf->Cell($width_cell[0],10,$i,1,0,'C');
	$pdf->Cell($width_cell[1],10,$row['code_cart'],1,0,'C');
	$pdf->Cell($width_cell[2],10,$row['tensanpham'],1,0,'C');
	$pdf->Cell($width_cell[3],10,$row['soluongmua'],1,0,'C');
	$pdf->Cell($width_cell[4],10,number_format($row['giasp']),1,0,'C');
	$pdf->Cell($width_cell[5],10,number_format($row['soluongmua']*$row['giasp']),1,1,'C');
	$t1=$a*$b;
	$t2+=$t1;
	$pdf->Ln(0);
	}

	$fill = !$fill;
	$width_cell=array(15,35,80,30,50,60); 
	$pdf->cell(210);
	$pdf->Cell($width_cell[5],10,number_format($t2),1,1,'C',$fill); 
	$pdf->SetFillColor(235,236,236);
	$pdf->Write(20,'Cảm ơn bạn đã đặt hàng tại Professor Computer.');
	$pdf->Ln(15);

	$pdf->cell(25);
	$pdf->Write(20,'Người bán hàng');
	$pdf->cell(60);
	$pdf->Write(20,'Thu ngân');	
	$pdf->cell(70);
	$pdf->Write(20,'Khách hàng');	

	$pdf->Output(); 
?>