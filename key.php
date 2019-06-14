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

    $redis->set('user:12345', 'Moh. Abdul Haq Aulia');

    $user = $redis->get('user:12345');

    echo $user."\n";
}
catch(Exception $e){
    die ($e->getMessage());
}