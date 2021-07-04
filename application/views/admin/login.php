<!DOCTYPE html>
<html>
<head>
	<title><?php echo(lang('login')); ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" >
	<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
	<meta name="description" content="">
	<meta name="author" content="fairsketch">
	<link rel="icon" href="<?php  echo get_system_file('logo.png'); ?>"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/b6f855c24c.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">


<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<?php
	load_css([
		"header",
		"footer",
		"common",
		"theme",
		"form"
	]);

	load_js(
		[
			"common",
		]
	);
?>
	
	<style type="text/css">
		main{
			text-align: center;
		}
		.login_form{

			position: absolute;
			top: 50%;
			width: 100%;
			transform: translateY(-50%);
			-webkit-transform: translateY(-50%);
		}
		.login_form	.login-box{
			display: block;
			width: 90%;
			max-width: 400px;
			margin: 5px auto;
		}
	</style>
</head>
<body>
	<main>
		<div class="login_form ">
			
			<div class="login-box">
				<div class="form-box">
					<div class="header">
						<div class="form-headeing">
							<h2><?php echo(lang("login_form")) ?></h2>
						</div>
					</div>
					<?php 
						if (isset($errormsg)) {
					?>
							<div class="form-alert">
								<h5><?php echo($errormsg); ?></h5>
							</div>
					<?php		
						}
					 ?>
					<form action="<?php echo(get_uri('login')) ?>" method="POST" >
						<div class="field-box">
							<label><?php echo(lang('username')); ?></label>
							<input type="text" name="username" value="<?php if(isset($username)){echo($username);} ?>" placeholder="<?php echo(lang('username')); ?>">
						</div>
						<div class="field-box">
							<label><?php echo(lang('password')); ?></label>
							<div class="password-box">
								<input type="password" value="<?php if(isset($password)){echo($password);} ?>" name="password" placeholder="<?php echo(lang('password')); ?>">
								<button class="fa fa-eye-slash primary-theme" id="password_eye_btn"></button>
							</div>
						</div>
						<div class="field-box">
							<label><?php echo(lang('captcha')); ?></label>
							<div class="captcha">
								<div>
									<?php echo($captcha); ?>
								</div>
								<input type="text" name="captcha" placeholder="write Your Captcha" maxlength="4" width="50">
							</div>
						</div>
						<div>
							<input type="submit" name="login" value="<?php echo(lang("login")) ?>" class="primary-theme">
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
</body>
</html>

<script type="text/javascript">
	$("#password_eye_btn").on('click',function(e){
		e.preventDefault();
		if($("#password_eye_btn").hasClass('fa fa-eye-slash')){
			$("#password_eye_btn").removeClass('fa fa-eye-slash');
			$("#password_eye_btn").addClass('fa fa-eye');	
			$("#password_eye_btn").siblings('input').attr('type','text');
		}else{
			$("#password_eye_btn").removeClass('fa fa-eye');	
			$("#password_eye_btn").addClass('fa fa-eye-slash');
			$("#password_eye_btn").siblings('input').attr('type','password');
			
		}
	})
</script>