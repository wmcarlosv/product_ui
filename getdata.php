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

	$data = $woocommerce->get('products/attributes/'.$id.'/terms/?per_page=100');
	$result = "";
	for($i = 0; $i < count($data); $i++){
		if(isset($data[$i]->description) and !empty($data[$i]->description)){
			$result .= '<option value="'.$data[$i]->name.'_'.$data[$i]->description.'">'.$data[$i]->name.'</option>';
		}else{
			$result .= '<option value="'.$data[$i]->name.'">'.$data[$i]->name.'</option>';
		}
		
	}

	return $result;
}

/*function getCategories(){
	global $woocommerce;
	$data = $woocommerce->get('products/categories');
	$result = "";

	for($i = 0; $i < count($data); $i++){
		$result .= '<option value="'.$data[$i]->name.'">'.$data[$i]->name.'</option>';
	}

	return $result;
}*/