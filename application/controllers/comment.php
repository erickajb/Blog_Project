<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->model('comment_model');	
	}

	
	public function insertComment(){
		date_default_timezone_set("America/Costa_Rica");

		$this->load->library('email','','correo');//Libreria para enviar correos

		$id_blog = $this->input->post('id_blog');

		$comment = array(
			'id_blog' => $id_blog,
			'author' => $this->input->post('author'),
			'comment' => $this->input->post('comment'),
			'date' => date('Y-m-d h:i:s'),
			'status'=> ('false')
			);


		$this->correo->from('erickajb88@gmail.com', 'Ericka Jimenez');// Para enviar correos
  		$this->correo->to('erickajb88@gmail.com');
 		$this->correo->subject('Notice comment on blog');
  		$this->correo->message($comment['author'].' a comentado tu blog su comentario fue: '.$comment['comment']);
		if($this->correo->send())
  			{
   				echo 'Correo enviado';
  			}
  		else
  			{
   				show_error($this->correo->print_debugger());
  			}

		$this->blog_model->insert('comments', $comment);
		redirect(base_url().'blog/view/'.$id_blog);
	}
	public function false_status(){			
		$data['comments'] = $this->comment_model->getAll();
		$data['comments'] = $this->comment_model->getlink();
		$this->load->view('admin_view', $data);		
	}
}