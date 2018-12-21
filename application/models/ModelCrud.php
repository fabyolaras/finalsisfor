<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelCrud extends CI_Model {

	public function lihat(){
		$query = $this->db->get('customer');
		return $query;
	}

	public function save($data){
		$this->db->insert('customer', $data);
	}

	public function edit($id){
		$query = $this->db->get_where('customer', array('id' => $id));
		return $query;
	}

	public function update($id, $data){
		$this->db->update('customer', $data, array('id' => $id));
	}

	public function delete($id){
		$this->db->where('id', $id);
		$query = $this->db->delete('customer');
	}
}