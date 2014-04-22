<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MaintComment_model extends CI_Model{

	
	public function actualiza_comment($id, $comentario){

		$this->db->where('id', $id);

		if( $this->db->update('comments', $comentario) )
			return true;		
		else
			return false;
		
	}
	public function eliminar_comment($id){

		$this->db->where('id', $id);

		if( $this->db->delete('comments') )
			return true;		
		else
			return false;		
		
	}

	public function leer_comment(){

		$this->db->order_by('id DESC');

		$query = $this->db->get('comments');

		return $query->result();
	}

	public function traer_comment($id){

		$this->db->where('id', $id);

		$query = $this->db->get('comments');

		return $query->row();
	}
}