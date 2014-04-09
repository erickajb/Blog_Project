<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('blog_model');		
	}
	
	public function index(){
		$data['entries'] = $this->blog_model->getEntries();		
		$this->load->view('blog_view', $data);
	}

	public function entry(){		
		$this->load->view('new_entry');
	}

	public function insert_entry(){
		login_site();
		date_default_timezone_set("America/Costa_Rica");	// Configuramos la zona horaria para que nos de la fecha exacta
		$entry = array(
			'permalink'  => permalink($this->input->post('title')),
			'author' => $this->session->userdata('username'),
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'date' => date('Y-m-d h:i:s')
			);		
		$this->blog_model->insert('entries', $entry);

		redirect(base_url());
	}

	public function view(){
		$entry_id = $this->uri->segment(3);
		$data['entry'] = $this->blog_model->getEntry($entry_id);
		$data['comments'] = $this->blog_model->getComments($entry_id);
		$this->load->view('view_entry', $data);
	}

	public function comment(){
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