<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Blog</title>	
</head>
<body>
	<?php include('menu.php');?>

	<?=form_open(base_url().'blog/insert_entry/')?>
	<p>Title: <?=form_input('title')?></p>
	<p>Content: <?=form_textarea('content')?></p>
	<?=form_submit('submit', 'Insert')?>
</body>
</html>