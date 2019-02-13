<?php

	include 'getdata.php';
	$codigo = getAttributeData(8);
	//$linea = getAttributeData(2);
	$formato = getAttributeData(6);
	//$editorial = getAttributeData(3);
	$categoria = getAttributeData(9);
	//$autores = getAttributeData(7);
	$idiomas = getAttributeData(5);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Carga de Productos</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1>Carga de Productos</h1>
				<hr />
				<table class="table table-bordered table-striped" width="100%">
					<thead>
						<th>Categoria</th>
						<th>Editorial</th>
						<th>Idioma</th>
						<th>Linea</th>
						<th>ISBN</th>
						<th>Titulo</th>
						<th>Formato</th>
						<th>Paginas</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th>Precio Rebajado</th>
						<th>Stock Actual</th>
						<!--<th>Stock Deseado</th>-->
						<th>Codigo</th>
						<th>Peso</th>
						<th>Ancho</th>
						<th>Alto</th>
						<th>Espesor</th>
						<th>Imagen</th>
						<th>Autores</th>
						<th>Fecha Creacion</th>
					</thead>
					<tbody id="load_lines">
						<form id="form_product">
						<?php for($i = 0; $i < 5; $i++){ ?>
							<tr>
					      		<td>
					      			<div class="input-group">
						      			<select class="form-control list_categorias" name="categoria[]">
							      			<?php print $categoria; ?>
							      		</select>
							      		<div class="input-group-btn">
									      <button class="btn btn-success add_attribute" data-select-class="list_categorias" data-title="Registrar Nueva Categoria" data-attribute-term-id="9" type="button">
									        <i class="glyphicon glyphicon-plus"></i>
									      </button>
									    </div>
						      		</div>
					      		</td>
					      		<td>
					      			<div class="input-group">
						      			<select class="form-control itemEditoriales list_editoriales" name="editorial[]">
							      			<!--<?php print $editorial; ?>-->
							      		</select>
							      		<div class="input-group-btn">
									      <button class="btn btn-success add_attribute" data-select-class="list_editoriales" data-title="Registrar Nueva Editorial" data-attribute-term-id="3" type="button">
									        <i class="glyphicon glyphicon-plus"></i>
									      </button>
									    </div>
						      		</div>
					      		</td>
					      		<td>
								<div class="input-group">
						      			<select class="form-control list_idiomas" style="width:120px;" name="idioma[]">
							      			<?php print $idiomas; ?>
							      		</select>
							      		<div class="input-group-btn">
									      <button class="btn btn-success add_attribute" data-select-class="list_idiomas" data-title="Registrar Nuevo Idioma" data-attribute-term-id="2" type="button">
									        <i class="glyphicon glyphicon-plus"></i>
									      </button>
									    </div>
						      		</div>
					      		</td>
					      		<td>
					      			<div class="input-group">
						      			<select class="form-control itemLineas list_lineas" style="width:120px;" name="linea[]">
							      			<!--<?php print $linea; ?>-->
							      		</select>
							      		<div class="input-group-btn">
									      <button class="btn btn-success add_attribute" data-select-class="list_lineas" data-title="Registrar Nueva Linea" data-attribute-term-id="2" type="button">
									        <i class="glyphicon glyphicon-plus"></i>
									      </button>
									    </div>
						      		</div>
					      		</td>
								<td><input type="text" name="isbn[]" style="width:110px;" class="form-control"></td>
					      		<td><textarea name="titulo[]" class="form-control"></textarea></td>
					      		<td>
					      			<div class="input-group">
						      			<select class="form-control list_formatos" style="width:100px;" name="formato[]">
							      			<?php print $formato; ?>
							      		</select>
							      		<div class="input-group-btn">
									      <button class="btn btn-success add_attribute" data-select-class="list_formatos" data-title="Registrar Nuevo Formato" data-attribute-term-id="6" type="button">
									        <i class="glyphicon glyphicon-plus"></i>
									      </button>
									    </div>
						      		</div>
					      		</td>
					      		<td><input type="text" name="paginas[]" style="width:70px;" class="form-control"></td>
					      		<td><textarea name="descripcion[]" class="form-control"></textarea></td>
					      		<td><input type="text" style="width:70px;" name="precio_con_descuento[]" class="form-control"></td>
					      		<td><input type="text" style="width:80px;" name="precio[]" class="form-control"></td>
					      		<td><input type="text" style="width:80px;" name="stock_actual[]" class="form-control"></td>
					      		<!--<td><input type="text" style="width:80px;" name="stock_requerido[]" class="form-control"></td>-->
					      		<td>
									<div class="input-group">
										<select class="form-control list_codigos" style="width:100px;" name="codigo[]">
							      			<?php print $codigo; ?>
						      			</select>
						      			<div class="input-group-btn">
									      <button class="btn btn-success add_attribute" data-select-class="list_codigos" data-title="Registrar Nuevo Codigo" data-attribute-term-id="8" type="button">
									        <i class="glyphicon glyphicon-plus"></i>
									      </button>
									    </div>
					      			</div>
					      		</td>
					      		<td><input type="text" name="peso[]" style="width:70px;" class="form-control"></td>
					      		<td><input type="text" name="ancho[]" style="width:70px;" class="form-control"></td>
					      		<td><input type="text" name="alto[]" style="width:70px;" class="form-control"></td>
					      		<td><input type="text" name="espesor[]" style="width:70px;" class="form-control"></td>
					      		<td><input type="file" name="imagen_<?php print $i; ?>" /></td>
					      		<td>
					      			<div class="input-group">
						      			<select class="form-control itemAutores list_autores" name="autores_<?php print $i; ?>[]" multiple="multiple">
										 <!--<?php print $autores; ?>-->
										</select>
										<div class="input-group-btn">
									      <button class="btn btn-success add_attribute" data-select-class="list_autores" data-title="Registrar Nuevo Autor" data-attribute-term-id="7" type="button">
									        <i class="glyphicon glyphicon-plus"></i>
									      </button>
									    </div>
									</div>
					      		</td>
					      		<td>
					      			<input type="date" class="form-control" name="fecha_creacion[]">
					      		</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<br />
			<input type="hidden" name="operation" value="add_product" />
			<!--<button type="button" id="add_products" class="btn btn-success">Guardar</button>-->
			<button type="sumit" class="btn btn-success">Guardar</button>
			</form>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Modal Header</h4>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<label for="name">Nombre: </label>
	        	<input type="text" id="name" class="form-control" />
	        	<input type="hidden" id="attribute_id" />
	        	<input type="hidden" id="select_class" />
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success save_term">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!--End Modal-->

	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/bootbox.min.js"></script>
	<script type="text/javascript" src="assets/js/preload.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('select.itemAutores').select2({
			  	minimumInputLength: 2,
			    ajax: {
			        url: 'ajax_autores.php',
			        dataType: 'json',
			        delay:250,
			        processResults : function(data){
			        	return {
			        		results : data
			        	};
			        },
			        cache : true
			    }
			});

			$('select.itemLineas').select2({
			  	minimumInputLength: 2,
			    ajax: {
			        url: 'ajax_lineas.php',
			        dataType: 'json',
			        delay:250,
			        processResults : function(data){
			        	return {
			        		results : data
			        	};
			        },
			        cache : true
			    }
			});

			$('select.itemEditoriales').select2({
			  	minimumInputLength: 2,
			    ajax: {
			        url: 'ajax_editoriales.php',
			        dataType: 'json',
			        delay:250,
			        processResults : function(data){
			        	return {
			        		results : data
			        	};
			        },
			        cache : true
			    }
			});

		});
	</script>
</body>
</html>