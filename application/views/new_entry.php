<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/index.css" />
	<meta charset="utf-8">
	<title>Blog</title>	
</head>
<body class="new_entry">
	<?php include('menu.php');?>
	<div class="frmPost">
		<?=form_open(base_url().'blog/insert_entry/')?>
		<p>Title: </p><?=form_input('title')?>
		<p>Content:</p><?=form_textarea('content')?>
		<?=form_submit('submit', 'Insert')?>
	</div>
	
</body>
</html>