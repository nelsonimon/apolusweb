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
				<li class='active'><a href="index.htm"><?php echo $op_titulo; ?> Usuário</a></li>
			</ol>

			<h1><?php echo $op_titulo; ?> Usuário</h1>
		</div>


		<div class="container">
			




			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-info">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 clearfix">
									<h4 class="pull-left" style="margin: 0 0 20px;"><?php echo $op_titulo; ?> Usuário</h4>
								   
								</div>
								<div class="col-md-12">
									<form id="form-validade" class="form-horizontal" action="" method="POST" >
										<div class="form-group">
										    <label for="nome" class="col-sm-2 control-label">Pessoa:</label>
										    <div class="col-sm-9">
										    	<select name="id_pessoa" id="id_pessoa" class="chosen-select form-control text-upper">
										    		<option value="">SELECIONE</option>
										    		<?php
										    			//print_r($pessoas);
										    			foreach ($pessoas as $pessoa) {
										    				?>
																<option value="<?php echo $pessoa["id"]; ?>"><?php echo $pessoa["nome"]; ?></option>
										    				<?php
										    			}
										    		?>
										    	</select>
										     
										    </div>

										    <input type="hidden" name="acao" value="<?php echo $op_action; ?>" >
										    <input type="hidden" name="id" value="<?php echo $id; ?>" >
										    
										</div>

										<div class="form-group">
											<label for="nome" class="col-sm-2 control-label">Perfil:</label>
										    <div class="col-sm-9">
											    <select name="id_ferfil_usuario" id="id_ferfil_usuario" class="chosen-select form-control text-upper" >
											    	<option value>SELECIONE</option>
										    		<?php
										    			//print_r($pessoas);
										    			foreach ($perfil_usuarios as $perfil) {
										    				?>
																<option value="<?php echo $perfil["id"]; ?>"><?php echo $perfil["descricao"]; ?></option>
										    				<?php
										    			}

										    		?>
										    	</select>
											</div>
										</div>

										<div class="form-group ">
											<label for="nome" class="col-sm-2 control-label">Login:</label>
										    <div class="col-sm-6">
											    <input type="text" class="form-control text-upper" id="login" name="login">
											</div>
											
										</div>

										<div class="form-group text-center">
								      			<div class="btn-toolbar">
								      				<button class="btn-primary btn" onclick="javascript:$('#validate-form').parsley( 'validate' );"><i class="fa fa-check"></i> Salvar</button>
									      			
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

    //$(".chosen-select").chosen({'width':'100%','white-space':'nowrap'});  
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:2},
      '.chosen-select-no-results': {no_results_text:'Oops, nada encontrado!'},
      '.chosen-select-width'     : {width:"100%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }

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


	// $.verify.addRules({
	//   henzo: function(r) {
	//   	r.prompt(r.field, "Loading...");


	//   	$.ajax({
	//   		url: 'verificarLogin',
	//   		type: 'POST',
	//   		data: {'login': r.val()},
	//   	})
	//   	.done(function(data) {
	  		
	//   		if(data!='')
	// 	    {
	// 	    	 r.callback(data);
	// 	    }
	// 	      return true;
	//   	});
	 
	//   }
	// });

	// $.validator.setDefaults({
	// 	submitHandler: function() {
	// 		alert("submitted!");
	// 	}
	// });
	
	

	$().ready(function() {

		$.validator.addMethod('selectcheck', function (value) {
	        return (value != '');
	    });

		// validate the comment form when it is submitted
		$.validator.setDefaults({
			submitHandler: function() {
				alert("submitted!");
			},
			ignore: ":hidden:not(select)"
		});

		// validate signup form on keyup and submit
		$("#form-validade").validate({
			errorClass:'has-error',
            validClass:'has-success',
            highlight: function (element, errorClass, validClass) { 
                            $(element).parents("div.form-group").addClass(errorClass).removeClass(validClass); 

         	}, 
          	unhighlight: function (element, errorClass, validClass) { 
                  $(element).parents("div.form-group").removeClass(errorClass).addClass(validClass); 
          	},
			rules: {
				login: {
					required: true,
					minlength: 4
				},
				id_pessoa:{
					selectcheck: true
				}
			},
			messages: {
				login: {
					required: "Informe um nome de login",
					minlength: "Seu login deve ter mais de 04 caracteres"
				}
			}
		});

	});
	
});
</script>



<script>

</script>