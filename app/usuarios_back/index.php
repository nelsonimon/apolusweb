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
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6 col-xs-12 col-sm-6">
							<a class="info-tiles tiles-orange" href="#">
								<div class="tiles-heading">Usuarios</div>
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
									

									for ($i=0; $i <count($usuarios['id_usuario']) ; $i++) { 
										# code...
										if($i==0)
										{
											?>
												 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
													<thead>
														<tr>
															<th>ID</th>
															<th>Login</th>
															<th>E-mail</th>
															<th>Tipo</th>
															<th>Status</th>
															<th>Data Cadastro</th>
														</tr>
													</thead>
													<tbody>
											<?php
										}

										?>
														<tr>
															<td><?php echo $usuarios["id_usuario"][$i]; ?></td>
															<td><?php echo $usuarios["login"][$i]; ?></td>
															   <td><?php echo $usuarios["email"][$i]; ?></td>
															   <td><?php echo $usuarios["tipo"][$i]; ?></td>
															   <td><?php echo $usuarios["flg_registro"][$i]; ?></td>
															   <td><?php echo $usuarios["data_registro"][$i]; ?></td>
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