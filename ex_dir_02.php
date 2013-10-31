<?php

include('SaveData.php');
//$a = SaveData::start();

//echo __DIR__.'/data/data.txt';

//$a = SaveData::restore('dir', __DIR__.'/data/data.txt');

$b = SaveData::restore();

echo "<pre>";
//var_dump($a->getAll());
echo "</pre>";

echo "<pre>";
var_dump($b->getAll());
echo "</pre>";




