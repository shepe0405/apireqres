<?php if (! defined('BASEPATH')) exit('No direct script acces allowed'); ?>
<!--DOCTYPE html-->
<html>
<head>
<body>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"/><!-- META DE RESPONSIVIDADE-->
	<title>Tutorial CodeIgniter</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/api_login.css">
</head>
<body>
<main>
	<div class="container" id="login">
		<h4 class="center">Registrar-se</h4>
			<?= form_open('login/salvar'); ?>
			<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">email</i>
							<input type="email" name="email" onblur="textLower(this)" autocomplete="off" placeholder="Digite seu E-mail">
						<label for="email">E-mail</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
							<input type="text" name="username" onblur="textLower(this)" autocomplete="off" placeholder="Digite seu Username">
						<label for="username">Nome</label>
					</div>
				</div>
					<div class="row">
						<div class="input-field col s10">
							<i class="material-icons prefix">lock</i>
								<input type="password" name="password" id="password" autocomplete="off" placeholder="Digite sua Senha">
							<label for="password">Senha</label>
						</div>
						<div class="input-field col s2">
							<button type="button" onclick="showPwd()" class="btn-flat waves-effect waves-light"><i class="large material-icons" onclick="changeIcon(this)">visibility_off</i></button>
						</div>
					</div>
				<div>
					<button type="submit" onclick="return validar()" class="btn waves-effect waves-light red darken-4">Registrar</button>
				</div>
			<?= form_close(); ?>
			<div class="center"><a href="<?=base_url('login/')?>" style="color: #263238;">Voltar</a></div>
	</div>
</main>

<?php $this->load->view('api/footer'); ?>