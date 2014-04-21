<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/index.css" />
	<meta charset="utf-8">
	<title>Blog</title>		
</head>
<body class="view_entry">
	<?php include('menu.php');?>

	<h2><?=$entry->title?></h2>
	<p><?=$entry->content?></p>
	Author: <?=$entry->author?><br />
	Date: <?=$entry->date?><br />
	<?php
		if(!empty($comments)){
			echo '<h3>Comments</h3>';
			foreach($comments as $comment)
				if($comment->status=='true'){
					echo '<h4>'.$comment->author.'</h4>'.
					$comment->comment.'<br />'.
					$comment->date.'<hr />';
				}
		}
		else
			echo '<h3>No Comments found!</h3>';
	?>
	<div class="sidebar2">
		<div>
			<h1> My Biography</h1>
			<img class ="imagen" src="assets/IMG.jpg">
		</div>
	</div>
	<div class="frmComment">
		<?=form_open(base_url().'comment/insertComment/')?>
		<p>Author:</p><?=form_input('author')?>
		<p>Your comment: </p>		
		<?=form_hidden('id_blog', $this->uri->segment(3))?>
		<?=form_textarea('comment')?>
		<?=form_submit('submit','Send')?>
		<?=form_close()?>
	</div>	
</body>
	
</html>