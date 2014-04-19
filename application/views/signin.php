<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/index.css" />
	<meta charset="utf-8"> 
	<title>Blog</title>	
</head>
<body  class="admin">
	<?php include('menu.php');?>	
	<?=form_open(base_url().'users/validateUser/')?>
	<?php echo (isset($error)) ? '<p>Incorrect Data!</p>' : '';?>
	<p>Username: <?=form_input('username')?></p>	
	<p>Password: <?=form_password('password')?></p>
	<div class="submit"><?=form_submit('submit', 'LOG IN')?></div>
	<img class="imgAdmin" src="<?php echo base_url(); ?>assets/admin.png" alt="">
</body>
</html>