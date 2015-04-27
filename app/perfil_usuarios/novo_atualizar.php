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
				<li class='active'><a href="index.htm"><?php echo $op_titulo; ?>Perfil de Usuário</a></li>
			</ol>

			<h1><?php echo $op_titulo; ?>Perfil de Usuário</h1>
		</div>


		<div class="container">
			




			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-info">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 clearfix">
									<h4 class="pull-left" style="margin: 0 0 20px;"><?php echo $op_titulo; ?>Perfil de Usuário</h4>
								   
								</div>
								<div class="col-md-12">
									<form class="form-horizontal" action="save" method="POST" >
										<div class="form-group">
										    <label for="nome" class="col-sm-2 control-label">Nome:</label>
										    <div class="col-sm-9">
										      <input type="text" class="form-control text-upper" id="nome" name="nome" value="<?php echo $nome; ?>" placeholder="Digite o nome do perfil">
										    </div>

										    <input type="hidden" name="acao" value="<?php echo $op_action; ?>" >
										    <input type="hidden" name="id" value="<?php echo $id; ?>" >
										    
										</div>
										<div class="form-group text-center">
								      			<div class="btn-toolbar">
									      			<button class="btn-primary btn"><i class="fa fa-check"></i> Salvar</button>
									      			<a href="index" class="btn-default btn"><i class="fa fa-reply"></i> Cancelar</a>
								      			</div>
								      	</div>
									</form>
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