<?php
	include '../classes/adminlogin.php';
 ?>
 <?php
 $class = new adminlogin();
	if($_SERVER['REQUEST_METHOD']==='POST'){
		$admin_user=$_POST['admin_user'];
		$admin_pass=md5($_POST['admin_pass']);
		$login_check = $class->login_admin($admin_user,$admin_pass);
	}
 ?>
 

<!DOCTYPE html>
<html>

<head>

<title>Trang Đăng Nhập</title>


<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="css/style.css" type="text/css" media="all">


<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">


</head>



<body>

	<h1>Trang Đăng Nhập</h1>

	<div class="w3layoutscontaineragileits">
	<h2>ĐĂNG NHẬP</h2>
	<span>
	<?php
	if(isset($login_check)){
		echo $login_check;
	}
	 ?>
</span>
		<form action="#" method="post">
			<input type="text" Name="admin_user" placeholder="Tài Khoản" >
			<input type="password" Name="admin_pass" placeholder="Mật Khẩu" >
			<div class="aitssendbuttonw3ls">
				<input type="submit" value="LOGIN">
				<p>Tạo tài khoản mới ?<a  href="register.php"> Tại Đây</a></p>
				<div class="clear"></div>
			</div>
		</form>
	</div>
	
	
	<div class="w3footeragile">
		<p> Công ty trách nhiệm hữu hạn một thành viên :)))</p>
	</div>

	
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>

</body>

</html>