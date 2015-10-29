<?php

require __DIR__ . '/../config/autoload.php';

use Entity\Telephones;
use Entity\MobileTelephone;
use Entity\Peoples;
use Entity\PhonesFromBlackList;

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
$tel->setId(++$idDevice);
$telephones[] = $tel;

$tel2 = new Telephones();
$tel2->setNumberPhone('+380427731173');
$tel2->setModel('DR-5');
$tel2->setBrand('Sumsung');
$tel2->setId(++$idDevice);
$telephones[] = $tel2;

$mobTel = new MobileTelephone();
$mobTel->setNumberPhone('+380933579930');
$mobTel->setModel('C6-01');
$mobTel->setBrand('Nokia');
$mobTel->setImei(325846975);
$mobTel->setId(++$idDevice);
$mobileTelephones[] = $mobTel;

$mobTel2 = new MobileTelephone();
$mobTel2->setNumberPhone('+380937891500');
$mobTel2->setModel('E-5');
$mobTel2->setBrand('MSI');
$mobTel2->setImei(4595856895);
$mobTel2->setId(++$idDevice);
$mobileTelephones[] = $mobTel2;

$people = new Peoples();
$people->setId(++$idPeople);
$people->setFirstName('Vladimir');
$people->setSecondName('Goncharenko');
$peoplesList[] = $people;

$people2 = new Peoples();
$people2->setId(++$idPeople);
$people2->setFirstName('Anna');
$people2->setSecondName('Lusokon');
$peoplesList[] = $people2;

$people3 = new Peoples();
$people3->setId(++$idPeople);
$people3->setFirstName('Natalia');
$people3->setSecondName('Dreval');
$peoplesList[] = $people3;

$itemBlackList = new PhonesFromBlackList();
$itemBlackList->setIdTelephone($mobTel2->getId());
$itemBlackList->setIdPeople($people->getId());
$blackList[] = $itemBlackList;

$servername = $config['host'];
$username = $config['db_user'];
$password = $config['db_password'];
$dbname = $config['db_name'];


$sql = "CREATE TABLE Peoples (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL
    )";
$sql3 = "CREATE TABLE Devices (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(30) NOT NULL,
    model VARCHAR(30) NOT NULL,
    typedev VARCHAR(30) NOT NULL,
    numberphone VARCHAR(30) NOT NULL
    )";
$sql2 = "DROP TABLE MyGuests";
try
{
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec($sql);
    $db->exec($sql3);
    echo "Table MyGuests created successfully";
}
catch(PDOException $e)
{
    echo "<br>" . $e->getMessage();
}

$db = null;

