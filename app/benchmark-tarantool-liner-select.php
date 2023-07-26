<?php

declare(strict_types=1);

namespace App;

require_once __DIR__ . '/vendor/autoload.php';

use Tarantool\Client\Client;
use Tarantool\Client\Schema\Criteria;

const KEYS_COUNT = 100000;

$client = Client::fromDsn('tcp://tarantool:3301');
$space = $client->getSpace('test');

// ------------------------------------------------------------

echo "Getting random staring from 1 up to " . KEYS_COUNT . " keys from  Tarantool..." . PHP_EOL . PHP_EOL;

$milliseconds1 = microtime(true);

for($i = 1; $i <= KEYS_COUNT; $i++) {
    $space->select(Criteria::key([$i]));
}

$time = (microtime(true) - $milliseconds1) * 1000;
echo "Time: $time ms" . PHP_EOL . PHP_EOL;

// ------------------------------------------------------------

print '...END' . PHP_EOL;



