<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require 'vendor/autoload.php';

$client = HttpClient::create();

$browser = new HttpBrowser($client);

$crawler = $browser->request('GET', 'https://vitormattos.github.io/poc-lineageos-cellphone-list-statics/');

$codigos = $crawler->filter('link[rel="stylesheet"],script[src]')->each(function ($node) {
  return $node->attr('src') ?? $node->attr('href');
});

print_r($codigos);
