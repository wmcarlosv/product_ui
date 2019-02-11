<?php
set_time_limit(0);
// Setup:
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

global $woocommerce;

$woocommerce = new Client(
    'https://ubikonline.com.ar', // Your store URL
    'ck_34a0da021c4b4777499300c3e938c486014a4851', // Your consumer key
    'cs_3f7a4e276ea0251b1697135fa2b0dac4510b933b', // Your consumer secret
    [
        'wp_api' => true, // Enable the WP REST API integration
        'version' => 'wc/v2'
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
		$idioma = $_POST['idioma'];

		for($i = 0; $i < count($_POST['titulo']); $i++){

			if(isset($name[$i]) and !empty($name[$i])){

				$autores = $_POST['autores_'.$i];
				$image = $_FILES['imagen_'.$i];
				$autores = array_slice($autores, 0, 4);

				$short_description = "<strong>".implode(',',$autores)."</strong><br />".$editorial[$i].", ".$formato[$i].",".$idioma[$i];

				$data = [
					'name' => $name[$i],
					'price' => $price[$i],
					'description' => $description[$i],
					'status' => 'publish',
					'weight' => $peso[$i],
					'price' => $price[$i],
					'regular_price' => $regular_price[$i],
					'sale_price' => $regular_price[$i],
					'short_description' => $short_description,
					'dimensions' => array(
						"length" => $espesor[$i],
					    "width" => $ancho[$i],
					    "height" => $alto[$i]
					),
					'images' => [
						[
							'src' => cargar_image($image),
							'position' => 0
						]
					],
					'attributes' => array(
						array(
							'id' => 8,
							'name' => 'codigo',
							'options' => array($codigo[$i])
						),
						array(
							'id' => 2,
							'name' => 'linea',
							'visible' => true,
							'options' => array($linea[$i])
						),
						array(
							'id' => 6,
							'name' => 'formato',
							'visible' => true,
							'options' => array($formato[$i])
						),
						array(
							'id' => 3,
							'name' => 'editorial',
							'visible' => true,
							'options' => array($editorial[$i])
						),
						array(
							'id' => 9,
							'name' => 'categoria',
							'visible' => true,
							'options' => array($categoria[$i])
						),
						array(
							'id' => 1,
							'name' => 'isbn',
							'visible' => true,
							'options' => array($isbn[$i])
						),
						array(
							'id' => 4,
							'name' => 'paginas',
							'visible' => true,
							'options' => array($paginas[$i])
						),
						array(
							'id' => 5,
							'name' => 'idioma',
							'visible' => true,
							'options' => array($idioma[$i])
						),
						array(
							'id' => 7,
							'name' => 'autores',
							'visible' => true,
							'options' => $autores
						)
					)
				];

				$result = $woocommerce->post('products', $data);
				$data = [];
			}
		}

	break;

}

function cargar_image($image){
	$file = file_get_contents($image['tmp_name']);
	$uniquesavename = time().uniqid(rand())."_".$image['name'];
	$url = 'https://ubikonline.com.ar/wp-json/wp/v2/media/';
	$ch = curl_init();
	$username = 'tolosaubik';
	$password = 'Tute100681';
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_POST, 1 );
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $file );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, [
		'Content-Disposition: form-data; filename="'.$uniquesavename.'"',
		'Authorization: Basic ' . base64_encode( $username . ':' . $password ),
	] );
	$result = json_decode(curl_exec( $ch ));
	$result = (array)$result;
	$img = $result['guid']->rendered;
	curl_close( $ch );
	return $img;
}