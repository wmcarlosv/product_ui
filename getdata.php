<?php
// Install:
// composer require automattic/woocommerce

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

function getAttributeData($id = NULL){
	global $woocommerce;

	$data = $woocommerce->get('products/attributes/'.$id.'/terms');
	$result = "";

	for($i = 0; $i < count($data); $i++){
		$result .= '<option value="'.$data[$i]->name.'">'.$data[$i]->name.'</option>';
	}

	return $result;
}