<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

require 'Predis/Autoloader.php';

Predis\Autoloader::register();

if (isset($_GET['cmd']) === true){
 header('Conten-Type: application/json');
 if($_GET['cmd']=='set'){
  $client=new Predis\Client([
   'scheme'=>'tcp',
   'host'  =>'redis-master',
   'port'  =>6379
   ]);
  $client->set($_GET['key'], $_GET['value']);
  print('{"message":"Updated"}');
} else{
  $client = new Predis\Client([
  'scheme'=>'tcp'
  'host'=>'redis-slave'
  'port'=>'6379'
    ]);
   $value = $client->get($_GET['key']);
   print('{"date":"'.$value.'"}');
 }
} else{
 phpinfo();
}?>
