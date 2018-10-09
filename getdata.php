<?php
// Install:
// composer require automattic/woocommerce

// Setup:
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

global $woocommerce;

$woocommerce = new Client(
    'https://floripajoven.com', // Your store URL
    'ck_a2b0cad06fd37965641a2a30b0186c62315974d3', // Your consumer key
    'cs_c97b07ccca25ac388974aa07b83eca48e38f73a2', // Your consumer secret
    [
        'wp_api' => true, // Enable the WP REST API integration
        'version' => 'wc/v2'
    ]
);

function getAttributeData($id = NULL){
	global $woocommerce;

	$data = $woocommerce->get('products/attributes/'.$id.'/terms');
	$result = "";

	for($i = 0; $i < count($data); $i++){
		$result .= '<option value="'.$data[$i]->name.'">'.$data[$i]->name.'</option>';
	}

	return $result;
}