<?php

include('SaveData.php');
$a = SaveData::restore();

echo $a->get('vm_4');

$a->set('names', array(
	'name1'=>'name 001',
	'name2'=>'name 102',
	'name3'=>'name 203',
	'name4'=>'name 305'
), false);


$a->remove('vm_4');


echo "<pre>";
var_dump($a->getAll());
echo "</pre>";



echo $a->get('vm_65','NOT EXIT');



$a->save();







