<?php


include('SaveData.php');


$b = SaveData::start();
$b ->dataInFile = true;
//$b->dataInFilePath = '';


$b  ->set('dirSaveData_1', 'DIR-DATA-001')
    ->set('dirSaveData_2', 'DIR-DATA-002')
    ->set('dirSaveData_3', 'DIR-DATA-003')
    ->set('dirSaveData_4', 'DIR-DATA-004');

$b->saveInFile();

