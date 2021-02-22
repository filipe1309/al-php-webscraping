<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require 'vendor/autoload.php';

$client = HttpClient::create();

$browser = new HttpBrowser($client);

// User agent spoofing
$browser->setServerParameter('HTTP_USER_AGENT', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');

$browser->request('GET', 'https://vitormattos.github.io/poc-lineageos-cellphone-list-statics/');

var_dump($browser->getRequest()); 
// Original:            HTTP_USER_AGENT "Symfony BrowserKit"
// User agent soppging: HTTP_USER_AGENT "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)"