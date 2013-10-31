<?php

include('SaveData.php');
$a = SaveData::restore();

//var_dump( $a->get('vm_4', "Fuks") );
/*
$a->set("v1","vvv")
	->set("v2","vvv")
	->set("v3","vvv")
	->set("v4","vvv")
	->set("v5","vvv")
	->set("v1","vvv");*/


//$a->removeAll(true);

echo "<pre>";
var_dump($a->getAll());
echo "</pre>";

