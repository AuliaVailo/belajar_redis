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

    $redis->setex('cart:12345', 10, "{\"nama\":\"shampo switzal\", \"amount\":\"10\"}");

    $run = true;
    
    while($run){
        $cart = $redis->get('cart:12345');
        echo $cart."\n";

        $ttl = $redis->ttl('cart:12345');
        echo "ttl:".$ttl."\n";

        sleep(1);

        if($ttl < 0){
            $run =false;
        }
    }
}
catch(Exception $e){
    die ($e->getMessage());
}