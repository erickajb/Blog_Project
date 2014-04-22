
<html>
<title>Blog</title> 
<?php include('menu.php');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/index.css" />

<body class="admin">
    <?php 
        if( isset($entries_actualizar) ){
            $id = '<p><input type="hidden" name="id" value="'.$this->uri->segment(3).'"></p>';
            $author = $entries_actualizar->author;
            $title = $entries_actualizar->title;
            $content = $entries_actualizar->content;
            $date = $entries_actualizar->date;        
            $accion = 'actualizarPost';
        }
        else{
            $id = '';
            $author = '';
            $title = '';
            $content = '';
            $date = '';
            $accion = 'insertar';
        }
    ?>
	<section >
        <form class="frmEditar" action="<?php echo base_url(); ?>index.php/maintEntries/<?php echo $accion; ?>" method="post">
            <?php  
            echo $id;        
            if( $this->uri->segment(3) != '' ){             
            
                echo '<div class="author"><p><label>Author: </label><input type="text" name="author" value="';echo $author . '" ></p></div>';
                echo '<div class="title"><p><label>Title: </label><input  type="text"  name="title" value= "';echo $title.'" ></p></div>';
                echo '<div class="content"><p><label>Content: </label><input type="text" size="30" name="content" value="';echo $content .  '"></p></div>';
                echo '<div class="date1" ><label>Date: </label> <input type="text" readonly="readonly" name="date" value="';echo $date . '"></div>';
                echo '<div class="submit"><input type="submit" name="guardar" value="Guardar" /></div>';
        
            }else {

                echo '<div class="author"><p><label>Author: </label><input type="text" name="author" readonly="readonly" value="';echo $author . '" ></p></div>';
                echo '<div class="title"><p><label>Title: </label><input  type="text" name="comment" readonly="readonly" value= "';echo $title.'" ></p></div>';
                echo '<div class="content"><p><label>Content: </label><input size="30" type="text" name="date" readonly="readonly" value="';echo $content .  '"></p></div>';
                echo '<div class="date1" ><label>Date: </label> <input type="text" readonly="readonly" name="status" value=' .  $date . "></div>";
                echo '<div class="submit"><input type="submit" name="guardar" value="Guardar" /></div>';
            }
    		?>
    	</form>

        <table>
            <tr>
                <td><strong>Author</strong></td>
                <td><strong>Title</strong></td>
                <td><strong>Content</strong></td>
                <td><strong>Date</strong></td>
                <td><strong>Edit Entries</strong></td>
                <td><strong>Delete</strong></td>
            </tr>

            <?php if (count($post) > 0 ): ?>
                <?php foreach($post as $post) : ?>

                     <tr>
                        <td><?php echo $post->author; ?></td>
                        <td><?php echo $post->title; ?></td>
                        <td><?php echo $post->content; ?></td>
                        <td><?php echo $post->date; ?></td>
                        <td><a href="<?php echo base_url(); ?>index.php/maintEntries/index/<?php echo $post->id; ?>">Edit Entries<a/></p></td>
                        <td><a href="<?php echo base_url(); ?>index.php/maintEntries/eliminarPost/<?php echo $post->id; ?>">Delete<a/></p></td>
                    </tr>
                <?php endforeach;?>
             <?php else :?>
                <h2>No Entries!!!</h2>
             <?php endif; ?>     
    </section>
</body>    
</html>