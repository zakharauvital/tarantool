<?php

declare(strict_types=1);

namespace App;

require_once __DIR__ . '/vendor/autoload.php';

print 'START...' . PHP_EOL;

$redis = new \Redis();
$redis->connect('redis', 6379);
echo "Connection to Redis is successfully" . PHP_EOL . PHP_EOL;

const KEYS_COUNT = 100000;

// ------------------------------------------------------------
echo "Getting " . KEYS_COUNT . " keys from Redis..." . PHP_EOL . PHP_EOL;

$milliseconds1 = microtime(true);
for ($i = 1; $i <= KEYS_COUNT; $i++) {
    $redis->get((string)$i);
}
$time = (microtime(true) - $milliseconds1) * 1000;
echo "Time: $time ms" . PHP_EOL . PHP_EOL;

// ------------------------------------------------------------

//echo "Getting " . KEYS_COUNT . " keys by MGET from Redis..." . PHP_EOL . PHP_EOL;
//
//$keys = [];
//for ($i = 1; $i <= KEYS_COUNT; $i++) {
//    $keys[] = (string)$i;
//}
//
//$milliseconds1 = microtime(true);
//$redis->mGet($keys);
//$time = (microtime(true) - $milliseconds1) * 1000;
//echo "Time: $time ms" . PHP_EOL . PHP_EOL;

// ------------------------------------------------------------

//echo "Inserting " . KEYS_COUNT . " keys into Redis..." . PHP_EOL . PHP_EOL;
//
//$redis->flushAll();
//
//$milliseconds1 = microtime(true);
//for ($i = 1; $i <= KEYS_COUNT; $i++) {
//    $redis->set((string)$i, (string)$i);
//}
//$time = (microtime(true) - $milliseconds1) * 1000;
//echo "Time: $time ms" . PHP_EOL . PHP_EOL;

// ------------------------------------------------------------

print '...END' . PHP_EOL;



