<?php

require_once __DIR__ . '/vendor/autoload.php';

use Predis\Client;

try{
    $redis = new Client();

    $redis = new Client(array(
        "scheme" => "tcp",
        "host"  => "192.168.22.129",
        "port" => 6379
    ));

    $redis->lpush('tim_bola', 'Persib');
    $redis->lpush('tim_bola', 'Persipura');
    $redis->lpush('tim_bola', 'Arema Cronus');
    $redis->lpush('tim_bola', 'Madura United');

    print_r($redis->lrange('tim_bola', 0, -1));

    $redis->rpush('tim_bola', 'Mitra Kukar');
    $redis->rpush('tim_bola', 'Semen Padang');
    $redis->rpush('tim_bola', 'Persija');
    $redis->rpush('tim_bola', 'PSM Makassar');

    print_r($redis->lrange('tim_bola', 0, -1));

    echo $redis->llen('tim_bola')."\n";

    echo $redis->lindex('tim_bola', 1)."\n";
    echo $redis->lindex('tim_bola', 2)."\n";
    echo $redis->lindex('tim_bola', 4)."\n";
    echo $redis->lindex('tim_bola', 5)."\n";
    echo $redis->lindex('tim_bola', 10)."\n";

    $redis->lset('tim_bola', 2, 'Persipura Jayapura FC');
    print_r($redis->lrange('tim_bola', 0, -1));

    $redis->lpop('tim_bola');
    print_r($redis->lrange('tim_bola', 0, -1));

    $redis->rpop('tim_bola');
    print_r($redis->lrange('tim_bola', 0, -1));

    $redis->lrem('tim_bola', 2, 'Persipura Jayapura FC');
    print_r($redis->lrange('tim_bola', 0, -1));

    $redis->del('tim_bola');
}
catch(Exception $e){
    die ($e->getMessage());
}