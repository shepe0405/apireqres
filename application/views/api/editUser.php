<?php if (! defined('BASEPATH')) exit('No direct script acces allowed'); 
$this->load->view('api/header');
?>
<main>
	<div class="container">
		<h4 class="center">Editar</h4>
		<?= form_open('user/saveUser'); ?>
		<div class="row">
			<div class="input-field col s12 m6 l6 xl6">
				<i class="material-icons prefix">email</i>
					<input type="email" name="email" value="<?=$usuarios->email?>" required placeholder="Digite o Nome do Contato">
				<label for="email">E-mail do Contato</label>
			</div>
			<div class="input-field col s12 m6 l6 xl6">
				<i class="material-icons prefix">photo</i>
					<input type="text" name="avatar" value="<?=$usuarios->avatar?>" required placeholder="Digite o Endereço do Avatar">
				<label for="avatar">Avatar</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12 m6 l6 xl6">
		       	<i class="material-icons prefix">account_circle</i>
		            <input type="text" required name="first_name" value="<?=$usuarios->first_name?>">
		        <label for="first_name">Primeiro nome</label>
		    </div>
		    <div class="input-field col s12 m6 l6 xl6">
		       	<i class="material-icons prefix">face</i>
		            <input type="text" required name="last_name" value="<?=$usuarios->last_name?>" class="datepicker">
		            <input type="hidden" name="id" value="<?=$usuarios->id?>">
		        <label for="last_name">Ultimo Nome</label>
		    </div>
		</div>
			<button type="submit" class="btn waves-effect waves-light red darken-4">Atualizar</button>
			<a href="<?= base_url('user/listUsers')?>" class="btn waves-light waves-effect blue-grey darken-4">Lista de Usuários</a>
		<?= form_close(); ?>
	</div>
</main>

<?php $this->load->view('api/footer'); ?>