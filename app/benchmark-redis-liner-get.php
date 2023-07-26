<?php

declare(strict_types=1);

namespace App;

require_once __DIR__ . '/vendor/autoload.php';

$redis = new \Redis();
$redis->connect('redis', 6379);
echo "Connection to Redis is successfully" . PHP_EOL . PHP_EOL;

const KEYS_COUNT = 100000;

// ------------------------------------------------------------
echo "Getting liner staring from 1 up to " . KEYS_COUNT . " keys from Redis..." . PHP_EOL . PHP_EOL;

$milliseconds1 = microtime(true);

for ($i = 1; $i <= KEYS_COUNT; $i++) {
    $redis->get((string)$i);
}

$time = (microtime(true) - $milliseconds1) * 1000;
echo "Time: $time ms" . PHP_EOL . PHP_EOL;

// ------------------------------------------------------------

print '...END' . PHP_EOL;



