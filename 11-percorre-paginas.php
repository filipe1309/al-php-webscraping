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
$modelos = $crawler->filter('article .title')->each(function ($node) {
  return $node->text();
});

for ($i = 0; $i <= $totalPaginas; $i++) {
  $crawler = $browser->request('GET', $url . $i);

  $modelos = array_merge($modelos, $crawler->filter('article .title')->each(function ($node) {
    return $node->text();
  }));
}
print_r($modelos);
