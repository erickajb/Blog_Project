<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/index.css" />
	<meta charset="utf-8">
	
	<title>Blog</title>	
</head>
<body class="admin">

	<?php include('menu.php');?>
	<h2 class="h2">All Comments disabled</h2>
	<div class="desabledComment">	
		<?=form_open(base_url().'comment/false_status/')?>
	
			<?php
				if(!empty($comments)){			
					foreach ($comments as $key => $comment)        
						if($comment['status'] == 'false'){
							echo '<h2> Post: '.'<br />'.$comment['permalink'].'</h2>'.			
							'<h4>Author: '.'<br />'.$comment['author'].'</h4>' .
							' Comment: '.'<br />'.$comment['comment'].'<br />'.
							'<br />'.$comment['date'] . '<hr/>';
						}								
				}
				else{
				echo '<h2>No Comments disabled!</h2>';	
			}				
		?>	
	</div>
	
</body>