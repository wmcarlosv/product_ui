$(document).ready(function(){

	$(".js-example-tokenizer").select2({
	    tags: true,
	    tokenSeparators: [',', ' ']
	});

	$('#add_line').click(function(){

		$( ".for-clone" ).clone().removeClass('for-clone').appendTo( "#load_lines" );

	});

});