<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>style/home.css">
	<script type="text/javascript" src="<?php echo base_url() ?>javascript/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>javascript/home.js"></script>
</head>
<body>
	<a href="logout">logout</a>
	<h3>usename: <?php echo $this->session->userdata('username')?> Password: <?php echo $this->session->userdata('password')?></h3>
	<div>
		<input type="checkbox" name="Anand" value="1" /> Anand
		<input type="checkbox" name="Albin" value="2" /> Albin
		<input type="checkbox" name="Arun" value="3" /> Arun Shankar
		<input type="checkbox" name="Krishnan" value="4" /> Krishnan
		<input type="checkbox" name="Sumesh" value="5" /> Sumesh
		<input type="checkbox" name="Shankar" value="6" /> Shankar
	</div>
	<div>
		<button id="search">Search</button>
	</div>
	<div id="main">
		
	</div>
</body>
</html>