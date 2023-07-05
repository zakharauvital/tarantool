<?php

declare(strict_types=1);

namespace App;

require_once __DIR__ . '/vendor/autoload.php';

use Tarantool\Client\Client;

print 'START...' . PHP_EOL;

const KEYS_COUNT = 1000000;

$client = Client::fromDsn('tcp://tarantool:3301');

$space = $client->getSpace('test');

$milliseconds1 = microtime(true);

for($i = 1; $i <= KEYS_COUNT; $i++) {
    $space->insert([$i, (string)$i]);
}

$time = (microtime(true) - $milliseconds1) * 1000;
echo "Inserted x 1 million records into Tarantool: $time ms" . PHP_EOL . PHP_EOL;

print '...END' . PHP_EOL;



