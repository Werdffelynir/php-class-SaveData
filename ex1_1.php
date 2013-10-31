<?php

include('SaveData.php');
$a = SaveData::start();

$a->set('vm_1_1', '_1001')
  ->set('vm_2_1', '_1002')
  ->set('vm_3_1', '_1003')
  ->set('vm_4_1', '_185004');

$a->save();

echo $a->get('vm_4');
echo $a->get('vm_4_1');



echo "<pre>";
var_dump($a->getAll());
echo "</pre>";

echo __DIR__;




//$a->set('vm_4', '004');
