<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require 'vendor/autoload.php';

$client = HttpClient::create();


$browser = new HttpBrowser($client);

$crawler = $browser->request('GET', 'https://vitormattos.github.io/poc-lineageos-cellphone-list-statics/');

// Index Crawler
// $html = $crawler->html();
// var_dump($html);

// Login Crawler
$login = $browser->clickLink('Login');
$html = $login->html();
var_dump($html);
