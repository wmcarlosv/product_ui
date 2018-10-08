<?php
	include 'getdata.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Carga de Productos</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/select2-4.0.6-rc.1/dist/css/select2.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1>Carga de Productos</h1>
				<hr />
				<button type="button" id="add_line" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Agregar Linea de Producto</button>
				<br />
				<br />
				<table class="table table-bordered table-striped">
					<thead>
						<th>ISBN</th>
						<th>Codigo</th>
						<th>Titulo</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th>P. con Descuento</th>
						<th>Linea</th>
						<th>Formato</th>
						<th>Paginas</th>
						<th>Editorial</th>
						<th>Categoria</th>
						<th>Peso</th>
						<th>Ancho</th>
						<th>Alto</th>
						<th>Espesor</th>
						<th>Imagen</th>
						<th>Stock Actual</th>
						<th>Stock Requerido</th>
						<th>Autores</th>
					</thead>
					<tbody id="load_lines">
						<?php 
							$clone_class = "";
							for($i = 0; $i < 5; $i++){ 

							if($i == 4){
								$clone_class = "class='for-clone'";
							}

							?>

							<tr <?php print $clone_class; ?>>
								<td><input type="text" name="isbn[]" style="width:110px;" class="form-control"></td>
								<td><select class="form-control" style="width:100px;" name="codigo[]">
					      			<option>-</option>
					      			<?php print $codigo; ?>
					      		</select></td>
					      		<td><textarea name="titulo[]" class="form-control"></textarea></td>
					      		<td><textarea name="descripcion[]" class="form-control"></textarea></td>
					      		<td><input type="text" style="width:70px;" name="precio[]" class="form-control"></td>
					      		<td><input type="text" style="width:80px;" name="precio_con_descuento[]" class="form-control"></td>
					      		<td><select class="form-control" name="linea[]">
					      			<option>-</option>
					      			<?php print $linea; ?>
					      		</select></td>
					      		<td><select class="form-control" style="width:100px;" name="formato[]">
					      			<option>-</option>
					      			<?php print $formato; ?>
					      		</select></td>
					      		<td><input type="text" name="paginas[]" style="width:70px;" class="form-control"></td>
					      		<td><select class="form-control" name="editorial[]">
					      			<option>-</option>
					      			<?php print $editorial; ?>
					      		</select></td>
					      		<td><select class="form-control" name="categoria[]">
					      			<option>-</option>
					      			<?php print $categoria; ?>
					      		</select></td>
					      		<td><input type="text" name="peso[]" style="width:70px;" class="form-control"></td>
					      		<td><input type="text" name="ancho[]" style="width:70px;" class="form-control"></td>
					      		<td><input type="text" name="alto[]" style="width:70px;" class="form-control"></td>
					      		<td><input type="text" name="espesor[]" style="width:70px;" class="form-control"></td>
					      		<td><input type="file" name="imagen[]" /></td>
					      		<td><input type="text" style="width:80px;" name="stock_actual[]" class="form-control"></td>
					      		<td><input type="text" style="width:80px;" name="stock_requerido[]" class="form-control"></td>
					      		<td>
					      			<select class="form-control js-example-tokenizer" name="autores[]" multiple="multiple">
									 <?php print $autores; ?>
									</select>
					      		</td>
							</tr>
						<?php } ?>																							
					</tbody>
				</table>
			<br />
			<button type="button" id="add_products" class="btn btn-success">Guardar</button>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>