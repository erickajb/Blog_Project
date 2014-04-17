<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('blog_model');		
	}

	public function insertComment(){
		date_default_timezone_set("America/Costa_Rica");
		$id_blog = $this->input->post('id_blog');
		$comment = array(
			'id_blog' => $id_blog,
			'author' => $this->input->post('author'),
			'comment' => $this->input->post('comment'),
			'date' => date('Y-m-d h:i:s')
			);

		$this->blog_model->insert('comments', $comment);
		redirect(base_url().'blog/view/'.$id_blog);
	}
}