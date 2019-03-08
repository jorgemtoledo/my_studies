<?php 
declare(strict_types=1);

// $api_url = 'https://jsonplaceholder.typicode.com/posts/1';


// Teste url API 1
// $responde = file_get_contents($api_url);
// var_dump($responde);


// Teste url API 2
// Usando curl
// $opts = [
//   CURLOPT_URL => $api_url,
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_SSL_VERIFYPEER => false,
// ];

// $ch = curl_init();
// curl_setopt_array($ch, $opts);

// $response = curl_exec($ch);
// if(empty($response))
// {
//   echo curl_error($ch);
//   exit(1);
// }

// echo $response;


// Teste url API 3
// Utilizando GuzzleHttp
require __DIR__.'/vendor/autoload.php';
$client = new GuzzleHttp\Client([
  'refify' => false,
  'base_uri' => 'https://jsonplaceholder.typicode.com',
]);
// $response = $client->request('GET', $api_url);
$response = $client->request('GET', '/posts/1');

echo $response->getBody();