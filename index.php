<?php
	set_time_limit(0);
	include 'getdata.php';
	$codigo = getAttributeData(8);
	//$linea = getAttributeData(2);
	$formato = getAttributeData(6);
	//$editorial = getAttributeData(3);
	//$categoria = getAttributeData(9);
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
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#product_load">Carga de Productos</a></li>
			  <li><a data-toggle="tab" href="#product_inventory">Inventarios de Productos</a></li>
			</ul>

			<div class="tab-content">
			  <div id="product_load" class="tab-pane fade in active">
			  	<h3>Carga de Productos</h3>
			    <form id="form_product">
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
							<th>Stock Deseado</th>
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
							<?php for($i = 0; $i < 5; $i++){ ?>
								<tr>
						      		<td>
						      			<div class="input-group">
							      			<select class="form-control itemCategorias list_categorias" name="categoria[]">
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
						      		<td><input type="text" style="width:80px;" name="stock_requerido[]" class="form-control"></td>
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
			  <div id="product_inventory" class="tab-pane fade">
			    <h3>Inventario de Productos</h3>
			    <table class="table table-striped table-bordered data-table">
			    	<thead>
			    		<th>ID</th>
			    		<th>Editorial</th>
			    		<th>Nombre</th>
			    		<th>Inventario</th>
			    		<th>Precio Normal</th>
			    		<th>Total</th>
			    		<th>Accion</th>
			    	</thead>
			    	<tbody>
			    		<?php 
			    			global $woocommerce;
							$products = []; //$woocommerce->get('products/?per_page=100');
							foreach($products as $product):
			    		?>
			    		<tr>
			    			<td><?=$product->id?></td>
			    			<td>
			    				<?php
			    					foreach($product->attributes as $attr){
			    						if($attr->id == 3){
			    							echo $attr->options[0];
			    						}
			    					}
			    				?>
			    			</td>
			    			<td><?=$product->name?></td>
			    			<?php if($product->manage_stock): ?>
			    				<td><?=$product->stock_quantity?></td>
			    			<?php else: ?>
			    				<td>0</td>
			    			<?php endif ?>
			    			<td><?=$product->regular_price?></td>
			    			<td><?=($product->regular_price*$product->stock_quantity)?></td>
			    			<td><button type="button" data-product="<?=$product->id?>$<?=$product->name?>$<?=$product->stock_quantity?>" class="btn btn-success modal-product"><i class="glyphicon glyphicon-plus"></i></button></td>
			    		</tr>
			    		<?php endforeach ?>
			    	</tbody>
			    </table>
			  </div>
			</div>
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

	<!-- Modal Inventario Productos-->
	<div id="myModalProduct" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Actualizar Inventario</h4>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	        	<label>Producto:</label>
	        	<input type="text" id="product_name" class="form-control" readonly="readonly" name=""/>
	        	<input type="hidden" id="product_id"/>
	        </div>
	        <div class="form-group">
	        	<label>Inventario:</label>
	        	<input type="text" class="form-control" id="inventario" />
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success save_product">Guardar</button>
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
	<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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

			$('select.itemCategorias').select2({
			  	minimumInputLength: 2,
			    ajax: {
			        url: 'ajax_categorias.php',
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

    		$('table.data-table').DataTable();

    		$("button.save_product").click(function(){
    			var product_id = $("#product_id").val();
    			var inventory = $("#inventario").val();
    			$(".save_product").attr("disabled",true).text("Actualizando...");
    			$.post("add_elements.php",{ operation:'add_inventory', 'product_id':product_id, 'inventory':inventory }, function( response ){
    				var data = JSON.parse(response);

    				if(data.updated == "yes"){
    					alert("Inventario Actualizado con Exito!!");
    					$("#myModalProduct").modal("hide");
    					location.reload();
    				}
    			});
    		});
		});

		$(document).on('click','button.modal-product', function(){

			var data = $(this).attr("data-product").split("$");
			$("#product_name").val(data[1]);
			$("#product_id").val(data[0]);
			$("#inventario").val(data[2]);
			$("#myModalProduct").modal("show");

		});
	</script>
</body>
</html>