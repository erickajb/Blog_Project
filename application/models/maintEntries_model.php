<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MaintEntries_model extends CI_Model{

	
	public function actualiza_entries($id, $post){

		$this->db->where('id', $id);

		if( $this->db->update('entries', $post) )
			return true;		
		else
			return false;
		
	}
	public function eliminar_entries($id){

		$this->db->where('id_blog', $id);
		$this->db->delete('comments');		
		$this->db->where('id', $id);
		$this->db->delete('entries');
			
	}

	
	public function leer_entries(){

		$this->db->order_by('id DESC');

		$query = $this->db->get('entries');

		return $query->result();
	}

	public function traer_entries($id){

		$this->db->where('id', $id);

		$query = $this->db->get('entries');

		return $query->row();
	}
}