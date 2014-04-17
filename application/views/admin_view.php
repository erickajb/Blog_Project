<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="assets/index.css">
	<meta charset="utf-8">
	<title>Blog</title>	
</head>
<body>

	<?php include('menu.php');?>
	<?=form_open(base_url().'comment/false_status/')?>

	<?php
		if(!empty($comments)){
			echo '<h2>Comment disable</h2>';
			foreach ($comments as $key => $comment)        
				if($comment['status'] == 'false'){
					echo '<h2> CODIGO: '.$comment['permalink'].'</h2>'.'<br />'.			
					' Author: '.$comment['author'].
					$comment['comment'].'<br />'.
					'<br />'.$comment['date'] . '<hr/>';}	
				if($comment['status'] == 'true'){			
					
				}								
		}
		else
			echo '<h2>No Comments disables!</h2>';								
	
	?>
