
<html>
<?php include('menu.php');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/index.css" />
<?php 
if( isset($comentario_actualizar) ){
    $id = '<p><input type="hidden" name="id" value="'.$this->uri->segment(3).'"></p>';
    $author = $comentario_actualizar->author;
    $comment = $comentario_actualizar->comment;
    $date = $comentario_actualizar->date;
    $status = $comentario_actualizar->status;        
    $accion = 'actualizar';
}
else{
    $id = '';
    $author = '';
    $comment = '';
    $date = '';
    $status = '';
    $accion = 'insertar';
}
?>

	<header>CRUD</header>
	<section >
        <form action="<?php echo base_url(); ?>index.php/maintenance/<?php echo $accion; ?>" method="post">
            <?php  
            echo $id;        
            if( $this->uri->segment(3) != '' ){             
                echo '<p><label>Author:</label><input type="text" name="author" value="';echo $author . '" ></p>';
                echo '<p><label>Comment:</label><input type="text" name="comment" value= "';echo $comment.'" ></p>';
                echo '<p><label>Date:</label><input type="text" name="date" value="';echo $date .  '"></p>';
                echo '<p><label>Status:</label><input type="text" name="status" value=' .  $status . "></p>";
                echo '<p><input type="submit" name="guardar" value="Guardar" ></p>';
        
            }else {
                echo '<p><label>Author:</label> <input type="text" name="author" readonly="readonly" value=' .  $author . "></p>";
                echo '<p><label>Comment:</label> <input type="text" name="comment" readonly="readonly" value=' . $comment . '></p>';
                
                echo '<p><label>Date:</label> <input type="text" name="date" readonly="readonly" value=' .  $date . "></p>";
                echo '<p><label>Status:</label> <input type="text" name="status" readonly="readonly" value=' .  $status . "></p>";
                echo '<p><input type="submit" name="guardar" value="Guardar" /></p>';
            }
    		?>
    	</form>

        <?php if (count($comentario) > 0 ): ?>
            <?php foreach($comentario as $comentario) : ?>
            <article>
                <p class="author" ><?php echo $comentario->author; ?></p>
                <p class="comment" ><?php echo $comentario->comment; ?></p>
                <p class="date" ><?php echo $comentario->date; ?></p>
                <p class="status" ><?php echo $comentario->status; ?></p>
                <p><a href="<?php echo base_url(); ?>index.php/maintenance/index/<?php echo $comentario->id; ?>">Edit Comment<a/></p>
                <p><a href="<?php echo base_url(); ?>index.php/maintenance/eliminar/<?php echo $comentario->id; ?>">Delete Comment<a/></p>
             <?php endforeach; ?>
        <?php else :?>
            <h2>No hay registros</h2>
        <?php endif; ?>

    </section>
</body>    
</html>