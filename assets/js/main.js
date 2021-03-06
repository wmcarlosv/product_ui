$(document).ready(function(){

	$(".js-example-tokenizer").select2({
	    tags: true,
	    tokenSeparators: [',', ' ']
	});

	$(".add_attribute").click(function(){

		var title = $(this).attr("data-title");
		var id = $(this).attr("data-attribute-term-id");
		var data_select_class = $(this).attr("data-select-class");

		$("#attribute_id").val(id);

		$('#select_class').val(data_select_class);

		$(".modal-title").text(title);

		$("#myModal").modal();

	});


	$(".save_term").click(function(){

		var id = $("#attribute_id").val();
		var name = $("#name").val();

		$(".save_term").attr("disabled",true).text("Guardando...");

		$.post('add_elements.php',{ term_id: id, name: name, operation : 'add_term' },function( response ){

			var data = JSON.parse(response);

			$("."+$("#select_class").val()).html( $("."+$("#select_class").val()).html() + '<option value="'+data.id+'">'+data.name+'</option>' );

			bootbox.alert("<h4>Atributo Registrado con Exito!!</h4>");

			$("#myModal").modal('hide');

			$("#name").val("");
			$(".save_term").attr("disabled",false).text("Guardar");
		});
	});




	/*$("#add_products").click(function(){

		waitingDialog.show('Registrado Productos...');

		$.post('add_elements.php',$('#form_product').serialize(),function( response ){

			console.log( response );

			waitingDialog.hide();

			bootbox.alert("<h4>Productos Registrados con Exito!!</h4>");

		});

	});*/


	$("#form_product").submit(function(event){
		  waitingDialog.show('Registrado Productos...');
		  //grab all form data  
		  var formData = new FormData($(this)[0]);
		  
		  $.ajax({
		    url: 'add_elements.php',
		    type: 'POST',
		    data: formData,
		    async: false,
		    cache: false,
		    contentType: false,
		    processData: false,
		    beforeSend : function(){
		    	waitingDialog.show('Registrado Productos...'); 
		    },
		    success: function ( response ) {

		      	console.log( response );

				waitingDialog.hide();

				bootbox.alert("<h4>Productos Registrados con Exito!!</h4>");

		    }
		  });
		 
		  return false;
	});

});