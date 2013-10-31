<?php

include('SaveData.php');
//$a = SaveData::start();

$b = SaveData::restore();

echo $b->get('vm_1');
/*
$a->set('vm_1', '001')
  ->set('vm_2', '002')
  ->set('vm_3', '003')
  ->set('vm_4', '85004');
$a->save();

$a->get('vm_4', '554');

echo $a->get('vm_55');
//var_dump($a->getAll());
*/





echo "<pre>";
var_dump($b->getAll());
echo "</pre>";





//$a->set('vm_4', '004');
