<?php
set_time_limit(0);
// Setup:
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

global $woocommerce;

$woocommerce = new Client(
    'http://floripajoven.com', // Your store URL
    'ck_8a46b95910f0313c01fa9ef404876b8a2fe83568', // Your consumer key
    'cs_2192330c16128f54d4ba0c515a47c8cab37ea544', // Your consumer secret
    [
        'wp_api' => true, // Enable the WP REST API integration
        'version' => 'wc/v2' // WooCommerce WP REST API version
    ]
);

$operation = $_POST['operation'];
//Terms Data
$id = isset($_POST['term_id']) ? $_POST['term_id'] : NULL ;
$name = isset($_POST['name']) ? $_POST['name'] : NULL ;

switch ($operation) {

	case 'add_term':

			global $woocommerce;

			$data = [
				'name' => $name
			];

			$result = $woocommerce->post('products/attributes/'.$id.'/terms', $data);

			print json_encode($result);

	break;
	case 'add_product':

		global $woocommerce;

		for($i = 0; $i < count($_POST['titulo']); $i++){

			$name = $_POST['titulo'];
			$price = $_POST['precio'];
			$regular_price = $_POST['precio_con_descuento'];
			$description = $_POST['descripcion'];
			$codigo = $_POST['codigo'];
			$linea = $_POST['linea'];
			$formato = $_POST['formato'];
			$editorial = $_POST['editorial'];
			$categoria = $_POST['categoria'];
			$isbn = $_POST['isbn'];
			$paginas = $_POST['paginas'];
			$peso = $_POST['peso'];
			$espesor = $_POST['espesor'];
			$ancho = $_POST['ancho'];
			$alto = $_POST['alto'];
			$autores = $_POST['autores'];
			$idiomas = $_POST['idioma'];

			$data = [
				'name' => $name[$i],
				'price' => $price[$i],
				'regular_price' => $regular_price[$i],
				'description' => $description[$i],
				'status' => 'publish',
				'weight' => $peso[$i],
				'price' => $price[$i],
				'regular_price' => $regular_price[$i],
				'dimensions' => array(
					"length" => $espesor[$i],
				    "width" => $ancho[$i],
				    "height" => $alto[$i]
				),
				'attributes' => array(
					array(
						'name' => 'codigo',
						'visible' => true,
						'options' => array($codigo[$i])
					),
					array(
						'name' => 'linea',
						'visible' => true,
						'options' => array($linea[$i])
					),
					array(
						'name' => 'formato',
						'visible' => true,
						'options' => array($formato[$i])
					),
					array(
						'name' => 'editorial',
						'visible' => true,
						'options' => array($editorial[$i])
					),
					array(
						'name' => 'categoria',
						'visible' => true,
						'options' => array($categoria[$i])
					),
					array(
						'name' => 'isbn',
						'visible' => true,
						'options' => array($isbn[$i])
					),
					array(
						'name' => 'paginas',
						'visible' => true,
						'options' => array($paginas[$i])
					),
					array(
						'name' => 'idioma',
						'visible' => true,
						'options' => array($idiomas[$i])
					),
					array(
						'name' => 'autores',
						'visible' => true,
						'options' => $autores[$i]
					)
				)
			];

			$result = $woocommerce->post('products', $data);

			$data = [];
		}

	break;

}