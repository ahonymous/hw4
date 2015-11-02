<?php

require __DIR__ . '/../config/autoload.php';

use Entity\Telephones;
use Entity\MobileTelephone;
use Entity\Peoples;
use Entity\PhonesFromBlackList;
use Layer\Connector\MyConnect;
use Layer\Manager\ManagerPeoples;
use Layer\Manager\ManagerTelephone;

$telephones = [];
$mobileTelephones = [];
$peoplesList = [];
$blackList = [];
$idDevice = 0;
$idPeople = 0;

$tel = new Telephones();
$tel->setNumberPhone('+380427736600');
$tel->setModel('Z-300');
$tel->setBrand('Philips');

$tel2 = new Telephones();
$tel2->setNumberPhone('+380427731173');
$tel2->setModel('DR-5');
$tel2->setBrand('Sumsung');

$mobTel = new MobileTelephone();
$mobTel->setNumberPhone('+380933579930');
$mobTel->setModel('C6-01');
$mobTel->setBrand('Nokia');
$mobTel->setImei(325846975);

$mobTel3 = new MobileTelephone();
$mobTel3->setNumberPhone('+380933579930');
$mobTel3->setModel('C6-01111');
$mobTel3->setBrand('Nokiaaa');
$mobTel3->setImei(325846975);

$mobTel2 = new MobileTelephone();
$mobTel2->setNumberPhone('+380937891500');
$mobTel2->setModel('E-5');
$mobTel2->setBrand('MSI');
$mobTel2->setImei(4595856895);

$people = new Peoples();
$people->setId(++$idPeople);
$people->setFirstName('Vladimir');
$people->setSecondName('Goncharenko');

$people2 = new Peoples();
$people2->setId(++$idPeople);
$people2->setFirstName('Anna');
$people2->setSecondName('Lusokon');

$people3 = new Peoples();
$people3->setId(++$idPeople);
$people3->setFirstName('Natalia');
$people3->setSecondName('Dreval');

$itemBlackList = new PhonesFromBlackList();
$itemBlackList->setIdTelephone($mobTel2->getId());
$itemBlackList->setIdPeople($people->getId());
/*
$servername = $config['host'];
$username = $config['db_user'];
$password = $config['db_password'];
$dbname = $config['db_name'];

$sql2 = "DROP TABLE Devices";
$sql = "CREATE TABLE Peoples (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL
    )";
$sql3 = "CREATE TABLE Telephones (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(30) NOT NULL,
    model VARCHAR(30) NOT NULL,
    typedev VARCHAR(30) NOT NULL,
    numberphone VARCHAR(30) NOT NULL,
    imai VARCHAR(30) NOT NULL
    )";
*/

$connect1 = new MyConnect();
$con = $connect1->connect($config['host'],$config['db_user'],$config['db_password'],$config['db_name']);
$manPeople = new ManagerPeoples($con);
$manTelephone = new ManagerTelephone($con);

try
{
    /*$manPeople->insert($people3);
    $manPeople->insert($people);
    $manPeople->insert($people2);
    $manPeople->update($people3);
    $manPeople->remove($people3);
    var_dump($manPeople->find('Peoples',1));
    var_dump($manPeople->findAll('Peoples'));
    var_dump($manPeople->findBy('Peoples',['firstname' ,'lastname']));
    $manTelephone->insert($mobTel);
    $manTelephone->update($mobTel3);
    $manTelephone->remove($mobTel3);
    var_dump($manTelephone->find('Telephones',325846975));
    var_dump($manTelephone->findAll('Telephones'));
    var_dump($manTelephone->findBy('Telephones',['brand','model']));*/
}
catch(PDOException $e)
{
    echo "<br>" . $e->getMessage();
}

$db = null;