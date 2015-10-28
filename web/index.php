<?php

require __DIR__ . '/../config/autoload.php';

use Entity\Telephones;
use Entity\MobileTelephone;
use Entity\Peoples;
use Entity\BlackListPhones;

$telephones = array();
$mobileTelephones = array();

$tel = new Telephones();
$tel->setNumberPhone('+380427736600');
$tel->setModelDevice('Z-300');
$tel->setBrandDevice('Philips');

array_push($telephones, $tel->moveToMas($telephones, $tel));
/*$telephones += $tel->moveToMas($telephones, $tel);*/

$tel2 = new Telephones();
$tel2->setNumberPhone('+3804277366002');
$tel2->setModelDevice('Z-3002');
$tel2->setBrandDevice('Philips2');

array_push($telephones, $tel2->moveToMas($telephones, $tel2));
/*$telephones += $tel2->moveToMas($telephones, $tel2);*/

var_dump($telephones);

$mobTel = new MobileTelephone();
$mobTel->setNumberPhone('+380933579930');
$mobTel->setModelDevice('C6-01');
$mobTel->setBrandDevice('Nokia');
$mobTel->setImei(325846975);

