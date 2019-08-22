<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
$this->load->view('api/header'); ?>


<main>
	<div class="container">
		<h4 class="center">Usuários</h4>
		<table class="centered">
			<thead>
				<tr>
					<th>ID</th>
					<th>PRIMEIRO NOME</th>
					<th>ULTIMO NOME</th>
					<th>EMAIL</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($usuarios as $user) { ?>
					<tr class=" modal-trigger" href="#modal_vis<?=$user['id']?>">
						<td><?=$user["id"]?></td>
						<td><?=$user["first_name"]?></td>
						<td><?=$user["last_name"]?></td>
						<td><?=$user["email"]?></td>
					</tr>
					<div class="modal" id="modal_vis<?=$user['id']?>">
						<div class="modal-content center">
							<?= '<a href="'.base_url('user/edit_user/'.$user["id"]).'" class="waves-effect waves-light btn-flat right tooltipped" data-position="bottom" data-tooltip="Editar"><i class="large material-icons">edit</i></a>'?>
							<form action="<?=base_url('user/del_user/'.$user["id"])?>" method="POST" style="display:inline-block">
									<input type="hidden" name="_method" value="DELETE">
									<button type="submit" class="waves-effect waves-light btn-flat right red-text text-darken-4 tooltipped" data-position="bottom" data-tooltip="Deletar/Excluir"><i class="large material-icons">delete_forever</i></button>
								</form>
							<h5><?=$user["first_name"]." ".$user["last_name"]?></h5>
							<p class="divider"></p>
								<img src="<?=$user['avatar']?>">
							<p class="divider"></p>
						</div>
						<div class="modal-footer">
							<div class="modal-close btn red darken-4">FECHAR</div>
						</div>
					</div>
				<?php } ?>
			</tbody>
		</table>
		<?=$paginacao?><br>
		<div class="row">
			<p class="left"><b>Número de registros retornados nessa página: <?=sizeof($usuarios)?></b></p>
			<a href="<?= base_url('user/new')?>" class="btn waves-light right waves-effect red darken-4">Novo</a>
		</div>
	</div>
</main>
<?php $this->load->view('api/footer'); ?>