<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MaintComment extends CI_Controller{	


	public function index(){		

		$this->load->model('maintComment_model');
		$data['comentario'] = $this->maintComment_model->leer_comment();	


		if( $this->uri->segment(3) != '' ){
			$id = $this->uri->segment(3);			
			$data['comentario_actualizar']	= $this->maintComment_model->traer_comment($id);
		}
		$this->load->view('maintComment_view',$data);
	}

	public function actualizar(){
		$comentario = array(
			'author' => $this->input->post('author'),
			'comment' => $this->input->post('comment'),
			'date' => $this->input->post('date'),
			'status' => $this->input->post('status')
			);
		$id = $this->input->post('id');

		$this->load->model('maintComment_model');
		if( $this->maintComment_model->actualiza_comment($id, $comentario) )
			redirect('maintComment');		
	}

	public function eliminar(){
		$id = $this->uri->segment(3);
		$this->load->model('maintComment_model');
		if( $this->maintComment_model->eliminar_comment($id) )
			redirect('maintComment');
	}
}