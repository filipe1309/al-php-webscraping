<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require 'vendor/autoload.php';

$client = HttpClient::create();

$browser = new HttpBrowser($client);

$url = 'https://vitormattos.github.io/poc-lineageos-cellphone-list-statics/';

$crawler = $browser->request('GET', $url);

$totalPaginas = $crawler->filter('header')->text();
$totalPaginas = preg_replace('/\D/', '', $totalPaginas);
$totalPaginas = ceil($totalPaginas / 10);
$modelos = $crawler->filter('article')->each(function ($node) {
  $result['modelo'] = $node->filter('.title')->text();
  $attributes = $node->filter('th')->each(function ($attr) {
    return $attr->text();
  });
  $values = $node->filter('th')->each(function ($attr) {
    return $attr->text();
  });
  $result = array_merge($result, array_combine($attributes, $values));
  return $result;
});

print_r($modelos);
