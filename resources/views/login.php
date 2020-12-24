<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel='stylesheet' type='text/css' href='../css/loginform.css'>
</head>
<body>
<div class="login-wrap">
<?php
$mysqli = new mysqli("103.124.95.89","hust_web_121223","0ROk5ttMxO8U2WSu","hust_web_012");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}



$mysqli -> close();
?>
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">ĐĂNG NHẬP</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">ĐĂNG KÍ</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Email</label>
					<input id="user" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Mật khẩu</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span>Giữ đăng nhập</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Đăng nhập">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Quên mật khẩu?</a>
				</div>
			</div>
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Email</label>
					<input id="user" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Mật khẩu</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Nhập lại mật khẩu</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Đăng kí">
				</div>
				<div class="hr"></div>
				
			</div>
		</div>
	</div>
</div>
</body>
</html>