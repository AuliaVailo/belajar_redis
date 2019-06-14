<?php

require_once __DIR__ .'/vendor/autoload.php';

use Predis\Client;

try{
    $predis = new Client();

    $predis = new Client(array(
        "scheme" => "tcp",
        "host"  => "192.168.22.129",
        "port" => 6379
    ));

    printf('Connection to redis has been established...\n');
}
catch(Exception $e){
    die ($e->getMessage());
}