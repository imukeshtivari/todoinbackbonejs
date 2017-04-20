<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function _remap($method, $params){
		$http_method = strtolower($this->input->post("_method") ? : $this->input->server("REQUEST_METHOD"));

		switch($method){
			case "todos":
				switch($http_method){
					case "get":

						header("Content-Type: application/json");
						$this->load->model("api_model");
						echo json_encode($this->api_model->_gettodos());
						die;

					case "post":

						header("Content-Type: application/json");

						// input_stream

						$task = @json_decode(file_get_contents("php://input"), true);
						if(!$task)
							die;

						$this->load->model("api_model");
						$this->api_model->_savetodo($task);

						
						echo json_encode($task);
						die;

						break;

					case "delete":
						if($params && $id = $params[0]){
							$this->load->model("api_model");
							if($this->api_model->_deletetodo($id)){
								echo json_encode([
									"status" => true,
									"message" => "Great, Successfully deleted."
								]);
								die;
							}
						}
					break;

					case "put":

						$task = json_decode(file_get_contents("php://input"), true);
						if(!$task)
							die;

						if($params && $id = $params[0]){
							$this->load->model("api_model");
							if($this->api_model->_updatetodo($id, $task)){
								echo json_encode($task);
								die;
							}
						}

					break;
				}
			break;
		}
	}
}
