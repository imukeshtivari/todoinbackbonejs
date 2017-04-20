<?php

class api_model extends CI_Model{
	public function __constructor(){

	}

	public function _gettodos(){
		$res = $this->db->select("*")
										->from("todos")
										->get();
		if($res->num_rows()){
			return $res->result_array();
		}

		return [];
	}

	public function _savetodo($task){
		$this->db->insert("todos",$task);
		return true;
	}

	public function _deletetodo($id){
		$this->db->where("id", $id);
		$this->db->delete("todos");
		return $this->db->affected_rows();
	}

	public function _updatetodo($id, $data){
		$this->db->where("id", $id);
		$this->db->update("todos", $data);
		return $this->db->affected_rows();
	}


}