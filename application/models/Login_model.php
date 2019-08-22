<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	function __construct()
	{
		parent:: __construct();
	}
	public function logar($username, $senha)
	{
		$url = "data.json";
		$dados = json_decode(file_get_contents($url), true);
		for ($i=0; $i < sizeof($dados["login"]); $i++) { 
			if ($dados["login"][$i]["senha"] == $senha && $dados["login"][$i]["username"] == $username) {
				return $dados["login"];
			}
		}

	}
	public function insertLogin($user)
	{
		$url = "data.json";
		$dados = json_decode(file_get_contents($url), true);
		$final = end($dados["login"]);
		$id = $final["id"] + 1;
		$arrayName = array(
			'id' => $id,
			'username' => $user["username"],
			'email' =>  $user["email"],
			'senha' =>  $user["senha"],
		 );
		array_push($dados["login"], $arrayName);
		$json = json_encode($dados);
		file_put_contents("data.json", $json);
	}
	public function getUserPwd($username)
	{
		$url = "data.json";
		$json = json_decode(file_get_contents($url), true);
		for ($i = 0; $i < sizeof($json["login"]) ; $i++) {
			//$login[$i] = $json["login"][$i]["senha"];
			if ($json["login"][$i]["username"] == $username) {
				return $json["login"][$i]["senha"];
			}
		}
		
	}

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */