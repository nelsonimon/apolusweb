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
				<li class='active'><a href="index.htm">Anúncios</a></li>
			</ol>

			<h1>Anúncios</h1>
		</div>


		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-4 col-xs-12 col-sm-4">
							<a class="info-tiles tiles-sky" href="#">
								<div class="tiles-heading">Novos</div>
								<div class="tiles-body-alt">
									<i class="fa fa-asterisk"></i>
									<div class="text-center"><?php echo $total_anuncios_novos; ?></div>
									<small>anúncios</small>
								</div>
								<div class="tiles-footer">gerenciar anúncios</div>
							</a>
						</div>


						<div class="col-md-4 col-xs-12 col-sm-4">
							<a class="info-tiles tiles-green" href="#">
								<div class="tiles-heading">Exibindo</div>
								<div class="tiles-body-alt">
									<i class="fa fa-video-camera"></i>
									<div class="text-center"><?php echo $total_anuncios_ativos; ?></div>
									<small>anúncios</small>
								</div>
								<div class="tiles-footer">gerenciar anúncios</div>
							</a>
						</div>

						<div class="col-md-4 col-xs-12 col-sm-4">
							<a class="info-tiles tiles-brown" href="#">
								<div class="tiles-heading">Não aprovados</div>
								<div class="tiles-body-alt">
									<i class="fa fa-ban"></i>
									<div class="text-center"><?php echo $total_anuncios_negados; ?></div>
									<small>anúncios</small>
								</div>
								<div class="tiles-footer">gerenciar anúncios</div>
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
									<h4 class="pull-left" style="margin: 0 0 20px;">Anúncios Novos</h4>
								   
								</div>
								<div class="col-md-12">
								<?php 
									$i=0;
									

									for ($i=0; $i <count($anuncios_novos['id_anuncio']) ; $i++) { 
										# code...
										if($i==0)
										{
											?>
												 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables table-responsive" id="example">
													<thead>
														<tr>
															<th>ID</th>
															<th>Imagem</th>
															<th>Titulo</th>
															<th>Valor</th>
															<th>LINK</th>
															<th>Usuário</th>
															<th width="155px">Ação</th>
														</tr>
													</thead>
													<tbody>
											<?php
										}

										?>
														<tr>
															<td><?php echo $anuncios_novos["id_anuncio"][$i]; ?></td>
															<td><img src="<?php echo $anuncios_novos["imagem"][$i]; ?>" style="max-width:50px; max-height:50px"/></td>
															   <td><small><?php echo $anuncios_novos["titulo"][$i]; ?></small></td>
															   <td><?php echo $anuncios_novos["valor"][$i]; ?></td>
															   <td><a href='<?php echo $anuncios_novos["url"][$i]; ?>' target="_blank"><i class="fa fa-link  tooltips" data-trigger="hover" data-original-title="<?php echo $anuncios_novos["url"][$i]; ?>"></i></a> </td>
															   <td><?php echo $anuncios_novos["login"][$i]; ?></td>
															   <td>
																	<div class="btn-group">
							                                            <button  type="button" class="btn btn-success  tooltips aprovar-anuncio" data-trigger="hover" data-original-title="aprovar" data-id="<?php echo $anuncios_novos["id_anuncio"][$i]; ?>"><i class="fa fa-check"></i></button>
							                                            <button type="button" class="btn btn-info  tooltips" data-trigger="hover" data-original-title="editar"><i class="fa fa-pencil"></i></button>
							                                            <button type="button" class="btn btn-danger  tooltips negar-anuncio" data-trigger="hover" data-original-title="negar" data-id="<?php echo $anuncios_novos["id_anuncio"][$i]; ?>"><i class="fa fa-ban"></i></button>
							                                        </div>
															   </td>
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


$(".aprovar-anuncio").on('click',  function(event) {
	var id_anuncio=$(this).attr('data-id');

	$.ajax({
		url: 'acao_anuncio',
		type: 'POST',
		data: {'id_anuncio': id_anuncio,
				'acao':'aprovar'
	 			},
	})
	.done(function(data) {

		if(data==1){
			$(".aprovar-anuncio[data-id="+id_anuncio+"]").parent().parent().parent().hide('fast');
		}
		else
		{
			alert(data);
		}
	});
	
});


$(".negar-anuncio").on('click',  function(event) {
	
	var id_anuncio=$(this).attr('data-id');

	$.ajax({
		url: 'acao_anuncio',
		type: 'POST',
		data: {'id_anuncio': id_anuncio,
				'acao':'negar'
	 			},
	})
	.done(function(data) {
		
		if(data==1){
			$(".negar-anuncio[data-id="+id_anuncio+"]").parent().parent().parent().hide('fast');
		}
		else
		{
			alert(data);
		}
	});
	
});
</script>