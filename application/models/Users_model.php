<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model {
	function __construct()
	{
		parent:: __construct();
	}
	public function get_users($qntd = null, $inicio = null)
	{
			$url = "data.json";
			$dados = json_decode(file_get_contents($url), true);
			if ($qntd != null) {
				return array_slice($dados["users"], $inicio, $qntd);
			} else {
				return $dados["users"];
			}
	}
	public function deleteUser($id = NULL)
	{
		if ($id != NULL) {
			$url = "data.json";
			$dados = json_decode(file_get_contents($url), true);
			foreach ($dados["users"] as $key => $value) {
				if (in_array($id, $value)) {
					unset($dados["users"][$key]);
				}
			}
			$query = json_encode($dados);
			$teste = file_put_contents($url, $query);
		}
	}
	public function getUserId($id)
	{
		$url = "data.json";
		$json = file_get_contents($url);
		$dados = json_decode($json);
		for ($i=0; $i < sizeof($dados->users); $i++) {
				if ($dados->users[$i]->id == $id) {
					$query = $dados->users[$i];
					return $query;	
				}
		}
	}
	public function create_user($user = NULL)
	{
		if ($user != NULL) {
			$url = "data.json";
			$dados = json_decode(file_get_contents($url), true);
			$final = end($dados["users"]);
			$id = $final["id"] + 1;
			$arrayName = array(
				'id' => $id,
				'email' => $user["email"],
				'first_name' =>  $user["first_name"],
				'last_name' =>  $user["last_name"],
				'avatar' => $user["avatar"]
			 );
			array_push($dados["users"], $arrayName);
			$json = json_encode($dados);
			file_put_contents("data.json", $json);
			}
	}
	public function update_user($id = NULL, $dados = NULL)
	{
		if ($dados != NULL && $id != NULL) {
			$url = "data.json";
			$json = json_decode(file_get_contents($url));
			$teste = $json->users;
			for ($i=0; $i < sizeof($teste); $i++) { 
				foreach ($teste as $key => $value) {
					if ($value->id == $id) {
						$value->id = $id;
						$value->email = $dados['email'];
						$value->first_name = $dados['first_name'];
						$value->last_name = $dados['last_name'];
						$value->avatar = $dados['avatar'];
					}
				}
				break;
			}
			$query = json_encode($json);
			$teste = file_put_contents($url, $query);
		}

}
}
/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */