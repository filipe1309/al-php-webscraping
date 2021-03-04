<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require 'vendor/autoload.php';

$client = HttpClient::create();

$browser = new HttpBrowser($client);

$crawler = $browser->request('GET', 'https://vitormattos.github.io/poc-lineageos-cellphone-list-statics/');

$images = $crawler->filter('article .img-thumbnail')->images();

if (!is_dir(('images'))) {
  mkdir('images');
}

foreach ($images as $image) {
  $url = $image->getUri();
  $name = basename($url);
  $imageContent = file_get_contents($url);
  file_put_contents('images/' . $name, $imageContent);
}
