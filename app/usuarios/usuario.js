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
	       // alert((value != ''));
	        if(value != '')
	        {
	        	return true;
	        }
	        else
	        {
	        	return false;
	        }
	        //return (value != '');

	    });

	    $('.chosen-select').on("change", function(){
		     $("#form-validade").validate().element($(this));
		});

		// validate the comment form when it is submitted
		$.validator.setDefaults({
			submitHandler: function() {
				submit();
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
				},
				id_ferfil_usuario:{
					selectcheck: true
				}
			},
			messages: {
				login: {
					required: "Informe um nome de login",
					minlength: "Seu login deve ter mais de 04 caracteres"
				},
				id_pessoa:{
					selectcheck: "Selecione uma pessoa"
				},
				id_ferfil_usuario:{
					selectcheck: "Escolha um perfil"
				}
			},
			  errorPlacement: function(error, element) {
			    if (element.attr("class").indexOf("chosen-select") > -1) {
			      error.insertAfter("#"+element.attr('name')+"_chosen");
			    } else {
			      error.insertAfter(element);
			    }
			  }
		});

	});
	
});