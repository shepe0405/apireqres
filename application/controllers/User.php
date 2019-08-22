<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
		$this->load->model('users_model');
	}

	public function listar()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('user/listar');
		$config['total_rows'] = count($this->users_model->get_users());
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<ul class="pagination center">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		
		$config['first_tag_open'] = '<li class="waves-effect">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="material-icons">chevron_left</i>';
		$config['prev_tag_open'] = '<li class="waves-effect">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '<i class="material-icons">chevron_right</i>';
		$config['next_tag_open'] = '<li class="waves-effect">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="waves-effect">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active waves-effect blue-grey darken-4"><a href="#!">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="waves-effect">';
		$config['num_tag_close'] = '</li>';
		$qntd = $config['per_page'];
		($this->uri->segment(3) != '') ? $inicio = $this->uri->segment(3) : $inicio = 0;
		$this->pagination->initialize($config);
		$dados['paginacao'] = $this->pagination->create_links();
		$dados['usuarios'] = $this->users_model->get_users($qntd, $inicio);
		$this->load->view('api/listar', $dados);
	}
	public function edit_user($id = NULL)
	{
		if ($id == NULL) {
			$this->session->set_flashdata('Erro', 'Erro ao Editar Usuário');
			redirect('user/listar','refresh');
		} else {
			$dados['usuarios'] = $this->users_model->getUserId($id);
			$this->load->view('api/editUser', $dados);
		}
			
	}
	public function del_user($id = NULL)
	{
		if ($id == NULL) {
			$this->session->set_flashdata('Erro', 'Erro ao Editar Usuário');
		} else {
			$this->users_model->deleteUser($id);
		}
		redirect('user/listar','refresh');
			
	}
	public function new()
	{
		$this->load->view('api/newUser');
	}
	public function saveUser()
	{
		$dados = array(
			'email' => $this->input->post('email'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'), 
			'avatar' => $this->input->post('avatar') 
		);
		$id = $this->input->post('id');
		if ($id) {
			$this->users_model->update_user($id, $dados);
			$this->session->set_flashdata('Sucesso', 'Sucesso ao Editar Usuário');
		} else {
			$this->users_model->create_user($dados);
			$this->session->set_flashdata('Sucesso', 'Sucesso ao Criar Usuário');
		}
		redirect('user/listar','refresh');
	}
}
/* End of file User.php */
/* Location: ./application/controllers/User.php */