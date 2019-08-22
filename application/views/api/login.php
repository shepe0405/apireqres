
<!--DOCTYPE html-->
<html>
<head>
<body>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"/><!-- META DE RESPONSIVIDADE-->
	<title>API</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/api_login.css">
</head>
<body>
	<main>
		<div class="container z-depth-4" id="login">
			<h4 class="center">Login</h4>
				<?= form_open('login/autenticar')?>
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
							<input type="text" name="username" onblur="textLower(this)" autocomplete="off" placeholder="Digite seu Usuário">
						<label for="username">Usuário</label>
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
				<div class="center col s12">
					<button type="submit" class="btn waves-effect waves-light red darken-4">Logar</button>
				</div>
				<?= form_close();?>
				<div class="center">
					<a href="<?= base_url('login/registrar')?>" style="color: #263238;">Registrar-se</a>
				</div>
		</div>
		<div>
<?php if ($this->session->flashdata("Sucesso")) { ?>
	<script>
		window.onload = function(){
		    M.toast({html: '<?=$this->session->flashdata("Sucesso")?>', classes: 'red darken-4'})
		};
	</script>
<?php } 
	if ($this->session->flashdata("Erro")) { ?>
		<script>
			window.onload = function(){
		    	M.toast({html: '<?=$this->session->flashdata("Erro")?>', classes: 'red darken-4'})
		  	};
		</script>
<?php } ?>
		</div>
	</main>

	<?php $this->load->view('api/footer'); ?>
