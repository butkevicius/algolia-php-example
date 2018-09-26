<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$client = new \AlgoliaSearch\Client(getenv('ALGOLIA_APP_ID'), getenv('ALGOLIA_APP_KEY'));
$index = $client->initIndex('algolia_php_workshop_local');

if ($argc < 2) {
    die('Missing search argument');
}

var_dump($index->search($argv[1]));
