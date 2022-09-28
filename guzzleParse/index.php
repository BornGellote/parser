<?php

require_once __DIR__ . '../../vendor/autoload.php';

use GuzzleHttp\Client;

echo 'sdfgfdfg';

$client = new Client([
    'base_uri' => 'https://www.teacherspayteachers.com/',
    'timeout'  => 2.0,
]);

$response = $client->request('GET', 'Product/The-Ultimate-Social-Skills-Character-Education-Bundle-33-Units-850pgs-3698363');

$code = $response->getStatusCode();
$body = $response->getBody();
echo $code . '</br>';
// var_dump($client);

echo '<pre>';
print_r(get_class_methods($response));
echo '</pre>';

var_dump($body->getContents());


