$(document).ready(function(){

	$(".js-example-tokenizer").select2({
	    tags: true,
	    tokenSeparators: [',', ' ']
	});

	$('#add_line').click(function(){

		$( ".for-clone" ).clone().removeClass('for-clone').appendTo( "#load_lines" );

	});

	$(".add_attribute").click(function(){

		var title = $(this).attr("data-title");
		var id = $(this).attr("data-attribute-term-id");

		$("#attribute_id").val(id);

		$(".modal-title").text(title);

		$("#myModal").modal();

	});

});