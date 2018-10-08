<?php
// Install:
// composer require automattic/woocommerce

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

function getAttributeData($id = NULL){
	global $woocommerce;
	$data = $woocommerce->get('products/attributes/'.$id.'/terms');
	$result = "";
	for($i = 0; $i < count($data); $i++){
		$result .= '<option value="'.$data[$i]->id.'">'.$data[$i]->name.'</option>';
	}

	return $result;
}

$codigo = getAttributeData(8);
$linea = getAttributeData(2);
$formato = getAttributeData(6);
$editorial = getAttributeData(3);
$categoria = getAttributeData(9);
$autores = getAttributeData(7);