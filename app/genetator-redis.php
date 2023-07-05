<?php

declare(strict_types=1);

namespace App;

require_once __DIR__ . '/vendor/autoload.php';

print 'START...' . PHP_EOL;

const KEYS_COUNT = 1000000;

$redis = new \Redis();
$redis->connect('redis', 6379);
echo "Connection to Redis is successfully" . PHP_EOL . PHP_EOL;

$redis->flushAll();

echo "Redis has been flushed all" . PHP_EOL . PHP_EOL;

$milliseconds1 = microtime(true);

$pipeline = $redis->pipeline();
for ($i = 1; $i <= KEYS_COUNT; $i++) {
    $pipeline->set((string)$i, (string)$i);
}
$pipeline->exec();

$time = (microtime(true) - $milliseconds1) * 1000;
echo "Inserted x1 million records into Redis: $time ms" . PHP_EOL . PHP_EOL;

print '...END' . PHP_EOL;



