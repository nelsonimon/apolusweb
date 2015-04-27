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
				<li class='active'><a href="index.htm">Perfil de Usuários</a></li>
			</ol>

			<h1>Perfil de Usuários</h1>
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
								<div class="tiles-heading">Perfil de Usuarios</div>
								<div class="tiles-body-alt">
									<i class="fa fa-group"></i>
									<div class="text-center"><?php echo $total_perfis; ?></div>
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
									<h4 class="pull-left" style="margin: 0 0 20px;">Perfis Cadastrados</h4>
								   
								</div>
								<div class="col-md-12">
								<?php 
									$i=0;
									

									for ($i=0; $i <count($usuarios['id_perfil']) ; $i++) { 
										# code...
										if($i==0)
										{
											?>
												 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
													<thead>
														<tr>
															<th>ID</th>
															<th>Perfil</th>
															<th class="text-center">Usuários</th>
															<th class="text-center">Operações</th>
														</tr>
													</thead>
													<tbody>
											<?php
										}

										?>
														<tr>
															<td><?php echo $usuarios["id_perfil"][$i]; ?></td>
															<td><?php echo $usuarios["descricao"][$i]; ?></td>
															<td class="text-center"><?php echo $usuarios["total_usuarios"][$i]; ?></td>
															<td class="text-center"><?php echo f_permissoesGerais($menus,$id_aplicacao,$usuarios["id_perfil"][$i],"'Atenção!'","'Tem certeza que deseja excluir este perfil? <br/> Todos os usuários deste perfil serão bloqueados!'","'delete?id=".$usuarios["id_perfil"][$i]."'"); ?></td>
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