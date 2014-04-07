<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<meta charset="utf-8">
	<title>Blog</title>		
</head>
<body>
	<?php include('menu.php');?>
	
	<h2><?=$entry->title?></h2>
	<p><?=$entry->content?></p>
	Author: <?=$entry->author?><br />
	Date: <?=convertDateTimetoTimeAgo($entry->date)?><br />
	Tags: <?=tags($entry->tags)?><hr />

		<?=form_open(base_url().'blog/comment/')?>
		<p>Author:<?=form_input('author')?></p>
		Your comment: 		
		<?=form_hidden('id_blog', $this->uri->segment(3))?>
		<?=form_textarea('comment')?>
		<?=form_submit('submit','Send')?>
		<?=form_close()?>
	

	<?php
		if(!empty($comments)){
			echo '<h3>Comments</h3>';
			foreach($comments as $comment)
				echo '<h4>'.$comment->author.'</h4>'.
				$comment->comment.'<br />'.
				convertDateTimetoTimeAgo($comment->date).'<hr />';
		}
		else
			echo '<h3>No Comments found!</h3>';
	?>
</body>
</html>