<?php

require_once __DIR__ .'/vendor/autoload.php';

use Predis\Client;

try{
    $predis = new Client();
    printf('Connection to redis has been established...\n');
}
catch(Exception $e){
    die ($e->getMessage());
}