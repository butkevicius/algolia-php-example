<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$client = new \AlgoliaSearch\Client(getenv('ALGOLIA_APP_ID'), getenv('ALGOLIA_APP_KEY'));
$index = $client->initIndex('algolia_php_workshop_local');

$dataUrl = 'https://raw.githubusercontent.com/algolia/datasets/master/contacts/contacts.json'; // see https://github.com/algolia/datasets
$batch = json_decode(file_get_contents($dataUrl), true);

try {
    $index->addObjects($batch);
} catch (\AlgoliaSearch\AlgoliaException $e) {
    echo $e->getMessage();
}

/**
 * Entry example
 {
    "firstname": "Essie",
    "lastname": "Vaill",
    "company": "Litronic Industries",
    "address": "14225 Hancock Dr",
    "city": "Anchorage",
    "county": "Anchorage",
    "state": "AK",
    "zip": "99515",
    "phone": "907-345-0962",
    "fax": "907-345-1215",
    "email": "essie@vaill.com",
    "web": "http://www.essievaill.com",
    "followers": 3574
  }
 */
$index->setSettings(
    [
        'customRanking' => ['desc(followers)'],

        'searchableAttributes' => [
            'lastname',
            'firstname',
            'company',
            'email',
            'city',
            'address'
        ]
    ]
);
