<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->model('comment_model');	
	}

	
	public function insertComment(){
		date_default_timezone_set("America/Costa_Rica");
		$id_blog = $this->input->post('id_blog');
		$comment = array(
			'id_blog' => $id_blog,
			'author' => $this->input->post('author'),
			'comment' => $this->input->post('comment'),
			'date' => date('h:i:s Y-m-d'),
			'status'=> ('false')
			);

		$this->blog_model->insert('comments', $comment);
		redirect(base_url().'blog/view/'.$id_blog);
	}
	public function false_status(){			
		$data['comments'] = $this->comment_model->getAll();
		$this->load->view('admin_view', $data);		
	}
}