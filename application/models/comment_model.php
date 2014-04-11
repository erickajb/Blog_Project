<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model {

	public function getComments($id){
		$this->db->where('id_blog', $id);

		return $this->db->get('comments')->result();
	}
}
