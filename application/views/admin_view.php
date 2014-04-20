<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/index.css" />
	<meta charset="utf-8">
	
	<title>Blog</title>	
</head>
<body class>

	<?php include('menu.php');?>

	<?=form_open(base_url().'comment/false_status/')?>

	<?php
		if(!empty($comments)){
			echo '<h2>All Comments disabled</h2>';
			foreach ($comments as $key => $comment)        
				if($comment['status'] == 'false'){
					echo '<h2> Post: '.$comment['permalink'].'</h2>'.			
					'<h4>Author: '.$comment['author'].'</h4>' .'<br />'.
					' Comment: '.$comment['comment'].'<br />'.
					'<br />'.$comment['date'] . '<hr/>';}	
				if($comment['status'] == 'true'){			
					
				}								
		}
		else
			echo '<h2>No Comments disabled!</h2>';	
	?>
</body>