<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model {

	public function getComments($id)
	{

		$this->db->where('id_blog', $id);

		return $this->db->get('comments')->result();
	}
	public function getAll()
	{	
		$this->db->order_by('date', "desc");
		$query = $this->db->get('comments');
		return $query->result_array();		
	}
	public function getlink()
	{
		$this->db->select('*');
		$this->db->from('entries');
		$this->db->join('comments', 'comments.id_blog = entries.id','left');
		$query = $this->db->get();
		return $query->result_array(); 
	}
	
}

