<?php

declare(strict_types=1);

namespace App;

require_once __DIR__ . '/vendor/autoload.php';

$redis = new \Redis();
$redis->connect('redis', 6379);
echo "Connection to Redis is successfully" . PHP_EOL . PHP_EOL;

const KEYS_COUNT = 1000000;

// ------------------------------------------------------------
echo "Getting random staring from 1 up to " . KEYS_COUNT . " keys from Redis..." . PHP_EOL . PHP_EOL;

while (true) {
    $redis->get((string)random_int(1, KEYS_COUNT));
    usleep(500);
}




