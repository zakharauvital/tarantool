<?php

declare(strict_types=1);

namespace App;

require_once __DIR__ . '/vendor/autoload.php';

use Tarantool\Client\Client;
use Tarantool\Client\Schema\Criteria;

print 'START...' . PHP_EOL;

const KEYS_COUNT = 100000;

$client = Client::fromDsn('tcp://tarantool:3301');

$space = $client->getSpace('test');

// ------------------------------------------------------------

//echo "Getting " . KEYS_COUNT . " keys from Tarantool..." . PHP_EOL . PHP_EOL;
//$milliseconds1 = microtime(true);
//for($i = 1; $i <= KEYS_COUNT; $i++) {
//    $space->select(Criteria::key([$i]));
//}
//$time = (microtime(true) - $milliseconds1) * 1000;
//echo "Time: $time ms" . PHP_EOL . PHP_EOL;

// ------------------------------------------------------------

//echo "Getting " . KEYS_COUNT . " keys by range from Tarantool..." . PHP_EOL . PHP_EOL;
//$milliseconds1 = microtime(true);
//$client->execute('select * from "test" where "id" between 1 and :count;', KEYS_COUNT);
//$time = (microtime(true) - $milliseconds1) * 1000;
//echo "Time: $time ms" . PHP_EOL . PHP_EOL;

// ------------------------------------------------------------

//echo "Inserting " . KEYS_COUNT . " keys into Tarantool..." . PHP_EOL . PHP_EOL;
//
//$client->call('box.space.test:truncate');
//$client->
//$milliseconds1 = microtime(true);
//for($i = 1; $i <= KEYS_COUNT; $i++) {
//    $space->insert([$i, (string)$i]);
//}
//$time = (microtime(true) - $milliseconds1) * 1000;
//echo "Time: $time ms" . PHP_EOL . PHP_EOL;

// ------------------------------------------------------------

print '...END' . PHP_EOL;



