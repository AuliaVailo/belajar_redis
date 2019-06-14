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

    $redis->sadd('employee', 'Smith');
    $redis->sadd('employee', 'Paul');
    $redis->sadd('employee', 'George');
    $redis->sadd('employee', 'Timothy');
    $redis->sadd('employee', 'Michael');
    $redis->sadd('employee', 'Alan');

    $redis->sadd('myset', 'Smith');
    $redis->sadd('myset', 'Paul');
    $redis->sadd('myset', 'George');
    $redis->sadd('myset', 'George');
    $redis->sadd('myset', 'George');
    $redis->sadd('myset', 'Christopher');

    print_r($redis->smembers('myset'));

    echo $redis->sismember('myset', 'George')."\n";
    echo $redis->sismember('myset', 'Alan')."\n";

    echo $redis->srem('myset', 'Paul');
    print_r($redis->smembers('myset'));

    print_r($redis->sdiff('myset', 'employee'));
    print_r($redis->sinter('myset', 'employee'));
    print_r($redis->sunion('myset', 'employee'));

    $redis->del('myset');
    $redis->del('employee');
    
}
catch(Exception $e){
    die ($e->getMessage());
}