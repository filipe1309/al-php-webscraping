<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require 'vendor/autoload.php';

$client = HttpClient::create();

$browser = new HttpBrowser($client);

$browser->request('GET', 'https://vitormattos.github.io/poc-lineageos-cellphone-list-statics/');

// Login Crawler
$browser->clickLink('Login');
$crawler = $browser->submitForm('Go', [
  'username' => 'teste',
  'password' => 'senha'
], 'GET');
var_dump($crawler->html());
