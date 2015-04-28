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
		     $("#form-validate").validate().element($(this));
		});

		// validate the comment form when it is submitted
		$.validator.setDefaults({
			submitHandler: function() {
				//alert("submitted!");
				submit();
			},
			ignore: ":hidden:not(select)"
		});

		// validate signup form on keyup and submit
		$("#form-validate").validate({
			errorClass:'has-error',
            validClass:'has-success',
           
            highlight: function (element, errorClass, validClass) { 
            	$(element).parents("div.form-group").addClass(errorClass).removeClass(validClass); 

         	}, 
          	unhighlight: function (element, errorClass, validClass) { 
          		$(element).parents("div.form-group").removeClass(errorClass).addClass(validClass); 	
          	},
          	 
			rules: {
				nome: {
					required: true,
					minlength: 4
				}
			},
			messages: {
				nome: {
					required: "Informe o nome do perfil",
					minlength: "O perfil deve ter mais de 04 caracteres"
				}
			}
		});

	
});