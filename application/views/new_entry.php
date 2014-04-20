<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/index.css" />
	<meta charset="utf-8">
	<title>Blog</title>	
</head>
<body class="new_entry">
	<?php include('menu.php');?>

	<?=form_open(base_url().'blog/insert_entry/')?>
	<p>Title: <?=form_input('title')?></p>
	<p>Content: <?=form_textarea('content')?></p>
	<?=form_submit('submit', 'Insert')?>
</body>
</html>