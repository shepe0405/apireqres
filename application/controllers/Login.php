<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('login_model');
	}
	public function logout()
	{
		$this->session->unset_userdata('Logado');
		$this->session->set_flashdata('Sucesso', 'Deslogado com Sucesso');
		redirect('login/','refresh');
	}
	public function index()
	{
		$this->load->view('api/login');
	}
	public function registrar()
	{
		$this->load->view('api/registrar');
	}
	public function autenticar()
	{
		$username = $this->input->post('username');
		$senha_sem = $this->input->post('password');
		$senha_hash = $this->login_model->getUserPwd($username);
		$senha = password_verify($senha_sem, $senha_hash);
		$user = $this->login_model->logar($username, $senha);
		if ($user) {
			$this->session->set_userdata("Logado", $user);
			$this->session->set_flashdata('Sucesso', 'Logado com Sucesso');
			redirect('user/listar','refresh');
		} else {
			$this->session->flashdata("Erro", "Usuário e/ou Senha Incorretos");
			redirect('login/','refresh');
		}

	}
	public function salvar()
	{
		$dados = array(
			'username' => $this->input->post('username'), 
			'email' => $this->input->post('email'), 
			'senha' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
		);
		$this->login_model->insertLogin($dados);
		$this->session->set_flashdata('Sucesso', 'Usuário Criado com Sucesso');
		redirect('login/','refresh');
		}
}
/* End of file Login.php */
/* Location: ./application/controllers/Login.php */