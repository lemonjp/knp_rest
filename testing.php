<?php

require __DIR__.'/vendor/autoload.php';

use Guzzle\Http\Client;

// create our http client (Guzzle)
$client = new Client('http://0.0.0.0:8001', array(
    'request.options' => array(
        'exceptions' => false,
    )
));

$nickname = 'ObjectOrienter'.rand(0,999);
$data = array(
  'nickname' => $nickname,
  'avatarNumber' => 2,
  'tagLine' => 'a test dev5!'
);

// 1) Create a programmer resource
$request = $client->post('/api/programmers',null,json_encode($data));
$response = $request->send();

/*
// to get the Location and programmers nickname.
$programmerUrl = $response->getHeader('Location');

// 2) GET a programmer resource
$request = $client->get($programmerUrl);
$response = $request->send();

// 3) GET a list of all programmers
$request = $client->get('/api/programmers');
$response = $request->send();
 */

echo $response;
echo "\n\n";
