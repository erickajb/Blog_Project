<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maintenance extends CI_Controller{	


	public function index(){	
		

		$this->load->model('maintenance_model');
		$data['comentario'] = $this->maintenance_model->leer_comment();		

		if( $this->uri->segment(3) != '' ){
			$id = $this->uri->segment(3);			
			$data['comentario_actualizar']	= $this->maintenance_model->traer_comment($id);
		}
		$this->load->view('maintenance_view',$data);
	}	


	public function actualizar(){
		$comentario = array(
			'author' => $this->input->post('author'),
			'comment' => $this->input->post('comment'),
			'date' => $this->input->post('date'),
			'status' => $this->input->post('status')
			);
		$id = $this->input->post('id');

		$this->load->model('maintenance_model');
		if( $this->maintenance_model->actualiza_comment($id, $comentario) )
			redirect('maintenance');		
	}

	public function eliminar(){
		$id = $this->uri->segment(3);
		$this->load->model('maintenance_model');
		if( $this->maintenance_model->eliminar_comment($id) )
			redirect('maintenance');
	}

		

}