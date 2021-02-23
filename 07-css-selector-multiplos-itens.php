<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require 'vendor/autoload.php';

$client = HttpClient::create();

$browser = new HttpBrowser($client);

$crawler = $browser->request('GET', 'https://vitormattos.github.io/poc-lineageos-cellphone-list-statics/');

$nomes = $crawler->filter('article .title')->each(function ($node) {
  return $node->text();
});

print_r($nomes);
