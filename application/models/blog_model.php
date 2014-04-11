<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public function getEntries(){
		$this->db->order_by('date DESC');
		return $this->db->get('entries')->result();
	}

	public function insert($table, $data){
		return $this->db->insert($table, $data);
	}

	public function getEntry($id){
		$this->db->where('id', $id);

		return $this->db->get('entries')->row();
	}
}
