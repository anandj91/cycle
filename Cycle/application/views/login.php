<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>style/login.css">
	<script type="text/javascript" src="<?php echo base_url() ?>javascript/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>javascript/login.js"></script>
</head>
<body>
	<?php echo form_open('CI_login/loginCheck'); ?>
		Username: <input type="text" name="username" /> <br />
		Password: <input type="password" name="password" /> <br />
		<input type="submit" name="login" value="Login" />
	<?php form_close() ?>
</body>
</html>