<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MaintEntries extends CI_Controller{	


	public function index(){	
		
		$this->load->model('maintEntries_model');
		$data['post'] = $this->maintEntries_model->leer_entries();	


		if( $this->uri->segment(3) != '' ){
			$id = $this->uri->segment(3);			
			$data['entries_actualizar']	= $this->maintEntries_model->traer_entries($id);
		}
		$this->load->view('maintEntries_view',$data);
	}	
	public function actualizarPost(){
		$post = array(
			'author' => $this->input->post('author'),
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'date' => $this->input->post('date')
			);
		$id = $this->input->post('id');

		$this->load->model('maintEntries_model');
		if( $this->maintEntries_model->actualiza_entries($id, $post) )
			redirect('maintEntries_view');		
	}
	public function eliminarPost(){
		$id = $this->uri->segment(3);
		$this->load->model('maintEntries_model');
		if( $this->maintEntries_model->eliminar_entries($id) )
			redirect('maintEntries_view');
	}
	
}