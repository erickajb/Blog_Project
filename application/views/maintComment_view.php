
<html>
<title>Blog</title> 
<?php include('menu.php');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/index.css" />

<body class="admin">
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
	<section >
        <form class="frmEditar" action="<?php echo base_url(); ?>index.php/maintComment/<?php echo $accion; ?>" method="post">
            <?php  
            echo $id;        
            if( $this->uri->segment(3) != '' ){             
            
                echo '<div class="author"><p><label>Author: </label><input type="text" name="author" value="';echo $author . '" ></p></div>';
                echo '<div class="comment"><p><label>Comment: </label><input size="30" type="text" name="comment" value= "';echo $comment.'" ></p></div>';
                echo '<div class="date"><p><label>Date: </label><input type="text" name="date" value="';echo $date .  '"></p></div>';
                echo '<div class="status" ><label>Status: </label> <input type="text" name="status" value=' .  $status . "></div>";
                echo '<div class="submit"><input type="submit" name="guardar" value="Guardar" /></div>';
        
            }else {

                echo '<div class="author"><p><label>Author: </label><input type="text" name="author" readonly="readonly" value="';echo $author . '" ></p></div>';
                echo '<div class="comment"><p><label>Comment: </label><input size="30" type="text" name="comment" readonly="readonly" value= "';echo $comment.'" ></p></div>';
                echo '<div class="date"><p><label>Date: </label><input type="text" name="date" readonly="readonly" value="';echo $date .  '"></p></div>';
                echo '<div class="status" ><label>Status: </label> <input type="text" readonly="readonly" name="status" value=' .  $status . "></div>";
                echo '<div class="submit"><input type="submit" name="guardar" value="Guardar" /></div>';
            }
    		?>
    	</form>

        <table>
            <tr>
                <td><strong>Author</strong></td>
                <td><strong>Comment</strong></td>
                <td><strong>Date</strong></td>
                <td><strong>Status</strong></td>
                <td><strong>Edit Comment</strong></td>
                <td><strong>Delete</strong></td>
            </tr>

            <?php if (count($comentario) > 0 ): ?>
                <?php foreach($comentario as $comentario) : ?>

                     <tr>
                        <td><?php echo $comentario->author; ?></td>
                        <td><?php echo $comentario->comment; ?></td>
                        <td><?php echo $comentario->date; ?></td>
                        <td><?php echo $comentario->status; ?></td>
                        <td><a href="<?php echo base_url(); ?>index.php/maintComment/index/<?php echo $comentario->id; ?>">Edit Comment<a/></p></td>
                        <td><a href="<?php echo base_url(); ?>index.php/maintComment/eliminar/<?php echo $comentario->id; ?>">Delete Comment<a/></p></td>
                    </tr>
                <?php endforeach;?>
             <?php else :?>
                <h2>No Entries!!!</h2>
             <?php endif; ?>     
    </section>
</body>    
</html>