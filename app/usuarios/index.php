<?php
	require_once("../header.php");
	require_once("../topo.php");
	
	//MENUS 
	require_once("../menu_esq.php"); 
	require_once("../menu_dir.php"); 
?>

<div id="page-content">
	<div id='wrap'>
		<div id="page-heading">
			<ol class="breadcrumb">
				<li class='active'><a href="index.htm">Usuários</a></li>
			</ol>

			<h1>Usuários</h1>
		</div>


		<div class="container">
		<?php 
			echo $_SESSION["msg"];
			if(isset($_SESSION["msg"]) && $_SESSION["msg"]=='')
			{
				echo $_SESSION["msg"];
			}

			$_SESSION["msg"]="";
		?>

			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6 col-xs-12 col-sm-6">
							<a class="info-tiles tiles-orange" href="#">
								<div class="tiles-heading">Usuários</div>
								<div class="tiles-body-alt">
									<i class="fa fa-group"></i>
									<div class="text-center"><?php echo $total_usuarios; ?></div>
									<small>cadastrados</small>
								</div>
								<div class="tiles-footer">gerenciar usuários</div>
							</a>
						</div>
						
					</div>
				</div>
			</div>




			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-info">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 clearfix">
									<h4 class="pull-left" style="margin: 0 0 20px;">Usuários Cadastrados</h4>
								   
								</div>
								<div class="col-md-12">
								<?php 
									$i=0;
									

									for ($i=0; $i <count($usuarios['id']) ; $i++) { 
										# code...
										if($i==0)
										{
											?>
												 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
													<thead>
														<tr>
															<th>ID</th>
															<th>Login</th>
															<th>Perfil</th>
															<th>Status</th>
															<th>Pessoa</th>
															<th>Empresa</th>
															<th>Ult. Alteração</th>
															<th class="text-center">Operações</th>
														</tr>
													</thead>
													<tbody>
											<?php
										}

										?>
														<tr>
															<td><?php echo $usuarios["id"][$i]; ?></td>
															<td><?php echo $usuarios["login"][$i]; ?></td>
															<td><?php echo $usuarios["perfil"][$i]; ?></td>
															<td><?php echo $usuarios["status"][$i]; ?></td>
															<td><?php echo $usuarios["nome_fantasia"][$i]; ?></td>
															<td><?php echo $usuarios["empresa"][$i]; ?></td>
															<td><?php echo $usuarios["data_alteracao"][$i]; ?></td>
															<td class="text-center"><?php echo f_permissoesGerais($menus,$id_aplicacao,$usuarios["id_perfil"][$i],"'Atenção!'","'Tem certeza que deseja excluir este Usuário? '","'delete?id=".$usuarios["id"][$i]."'"); ?></td>
														</tr>
										<?php
									}

									if($i>0)
									{
										?>
													</tbody>
                            					</table>
										<?php
									}
								?>
									 
								</tbody>
							</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			   
			</div>

			
		   
		</div> <!-- container -->
	</div> <!--wrap -->
</div> <!-- page-content -->
<?php
	require_once("../rodape.php");
?>
<script>
	// -------------------------------
// Initialize Data Tables
// -------------------------------

$(document).ready(function() {
	$('.datatables').dataTable({
		"sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page",
			"sSearch": ""
		}
	});
	$('.dataTables_filter input').addClass('form-control').attr('placeholder','Search...');
	$('.dataTables_length select').addClass('form-control');
});
</script>