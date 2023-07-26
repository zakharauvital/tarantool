<?php

declare(strict_types=1);

namespace App;

require_once __DIR__ . '/vendor/autoload.php';

use Tarantool\Client\Client;
use Tarantool\Client\Schema\Criteria;

const KEYS_COUNT = 1000000;

$client = Client::fromDsn('tcp://tarantool:3301');
$space = $client->getSpace('test');

// ------------------------------------------------------------

echo "Getting random staring from 1 up to " . KEYS_COUNT . " keys from  Tarantool..." . PHP_EOL . PHP_EOL;

while (true) {
    $space->select(Criteria::key([random_int(1, KEYS_COUNT)]));
    usleep(500);
}





