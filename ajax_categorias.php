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

$term = $_GET['term'];
$data = $woocommerce->get('products/categories/?search='.$term."&per_page=100");
$json = [];

for($i=0;$i<count($data);$i++){
	$json[] = ['id'=>$data[$i]->id, 'text'=>$data[$i]->name];
}

print json_encode($json);