<!DOCTYPE html>
<html lang="en">
<head>	
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/index.css" />
	<title>Blog</title>	
</head>
<body class="blog">

	<div id="sidebar">
		<div>
			<h1> My Biography</h1>
			<img class ="imagen" src="assets/IMG.jpg" alt="">
		</div>
	</div>

	<?php include('menu.php');?>

	<?php if (!empty($entries)) : ?>
		<?php foreach($entries as $entry) : ?>
			<h2><?=anchor(base_url().'blog/view/'.$entry->id,$entry->title)?></h2>
			Author: <?=$entry->author?><br />
			Date: <?=$entry->date?><hr/>
		<?php endforeach; ?>
	<?php else : ?>
		<h1>No entries</h1>
	<?php endif; ?>	
	
</body>
</html>