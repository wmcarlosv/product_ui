<?php

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
$id = $_POST['term_id'];
$name = $_POST['name'];

switch ($operation) {
	case 'add_term':

			global $woocommerce;
			
			$data = [
				'name' => $name
			];

			$result = $woocommerce->post('products/attributes/'.$id.'/terms', $data);

			print json_encode($result);

	break;
}

