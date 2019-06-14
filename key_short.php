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

    $redis->set('visitor:home', 1);

    for($i=0 ; $i < 10; $i++){
        $redis->incr('visitor:home');
        echo $redis->get('visitor:home')."\n";
    }

    echo "\n";

    for($i=0;$i<10;$i++){
        $redis->decr('visitor:home');
        echo $redis->get('visitor:home')."\n";
    }
}
catch(Exception $e){
    die ($e->getMessage());
}