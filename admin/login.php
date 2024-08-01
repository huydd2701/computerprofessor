<?php
	session_start();
	include('config/config.php');
	if(isset($_POST['dangnhap'])){
		$username = $_POST['username'];
		$password = ($_POST['password']);
		$sql = "SELECT * FROM admin WHERE username='".$username."' AND password='".$password."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$_SESSION['dangnhap'] = $username;
			header("Location:index.php");
		}else{
			echo '<script language="javascript">alert("Tên đăng nhập hoặc mật khẩu không đúng, vui lòng đăng nhập lại"); window.location="login.php"</script>';
			/*header("Location:login.php");*/
		}
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng nhập Admin</title>
	<link rel="website icon" type ="png" href="https://cdn-icons-png.flaticon.com/512/7542/7542190.png">
	<link rel="stylesheet" type="text/css" href="css/loginadmin.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="fadeIn first">
      <img src="https://cdn-icons-png.flaticon.com/512/2102/2102633.png" id="icon" alt="User Icon" />
    </div>
    
	<form action="" autocomplete="off" method="POST">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Tên đăng nhập">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mật khẩu">
      <input type="submit" class="fadeIn fourth" name ="dangnhap" value="Đăng nhập">
    </form>

  </div>
</div>
</body>
</html>
	
