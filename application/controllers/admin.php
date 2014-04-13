<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->model('comment_model');		
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
			'date' => date('h:i:s Y-m-d')
			);		
		$this->blog_model->insert('entries', $entry);

		redirect(base_url());
	}

	public function view(){
		$entry_id = $this->uri->segment(3);
		$data['entry'] = $this->blog_model->getEntry($entry_id);
		$data['comments'] = $this->comment_model->getComments($entry_id);
		$this->load->view('view_entry', $data);
	}

}