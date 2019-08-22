<?php if (! defined('BASEPATH')) exit('No direct script acces allowed'); ?>

<!--DOCTYPE html-->
<html>
<head>
<body class="grey lighten-3">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/><!-- META DE RESPONSIVIDADE-->
  <title>API</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/api.css">
</head>
  <header>
    <nav>
      <div class="nav-wrapper blue-grey darken-4">
        <a href="#" class="brand-logo center">Logo</a>
        <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="<?=base_url('user/listUsers')?>">Usuarios</a></li>
          <li><a href="#modal_out" class="modal-trigger">Sair</a></li>
        </ul>
      </div>
    </nav>
    <ul class="sidenav" id="mobile">
      <li><a href="#modal_out" class="modal-trigger">Sair</a></li>
      <li><a href="<?=base_url('user/listUsers')?>">Usuarios</a></li>
    </ul>
  </header>
  <div class="modal" id="modal_out">
    <div class="modal-content">
      <h5><b>Deseja sair do Sitema?</b></h5>
    </div>
    <div class="modal-footer">
      <a href="#!" class="btn waves-light waves-effect blue-grey darken-4">Cancelar</a>
      <a href="<?= base_url('login/logout')?>" class="btn waves-effect waves-light red darken-4">Sair</a>
    </div>
  </div>

<?php 
  if ($this->session->flashdata("Sucesso")) { ?>
  <script>
    window.onload = function(){
        M.toast({html: '<?=$this->session->flashdata("Sucesso")?>', classes: 'blue-grey darken-4'})
      };
  </script>
<?php } ?>
<?php 
  if ($this->session->flashdata("Erro")) { ?>
  <script>
    window.onload = function(){
        M.toast({html: '<?=$this->session->flashdata("Erro")?>', classes: 'red darken-4'})
      };
  </script>
<?php } ?>