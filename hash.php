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

    $redis->hset('user:123', 'name', 'Aulia');
    $redis->hset('user:123', 'email', 'abdul.haq.aulia@gmail.com');
    $redis->hset('user_123', 'dob', '1990-10-25');

    print_r($redis->hgetall('user:123'));

    echo $redis->hget('user:123', 'name')."\n";
    echo $redis->hget('user:123', 'email')."\n";
    echo $redis->hget('user:123', 'dob')."\n";

    print_r($redis->hkeys('user:123'));
    print_r($redis->hvals('user:123'));

    echo $redis->hstrlen('user:123', 'name')."\n";
    echo $redis->hlen('user:123')."\n";
    echo $redis->hexists('user:123', 'email')."\n";
    echo $redis->hexists('user:123', 'website')."\n";

    $redis->hdel('user:123', 'dob')."\n";
    echo $redis->hexists('user:123', 'dob')."\n";

    $redis->del('user:123');
}
catch(Exception $e){
    die ($e->getMessage());
}