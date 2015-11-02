<?php

require __DIR__ . '/../config/autoload.php';

use Entity\Telephones;
use Entity\MobileTelephone;
use Entity\Peoples;
use Entity\PhonesFromBlackList;
use Layer\Connector\MyConnect;
use Layer\Manager\ManagerPeoples;
use Layer\Manager\ManagerTelephone;
use Layer\Manager\ManagerBlackList;

$mobTel = new MobileTelephone();
if(isset($_POST['phonenumber'])) $mobTel->setNumberPhone($_POST['phonenumber']); else $mobTel->setNumberPhone('');
if(isset($_POST['model'])) $mobTel->setModel($_POST['model']); else $mobTel->setModel('');
if(isset($_POST['brand'])) $mobTel->setBrand($_POST['brand']); else $mobTel->setBrand('');
if(isset($_POST['imai'])) $mobTel->setImei($_POST['imai']); else $mobTel->setImei('');
if(isset($_POST['functionTel'])) $mobSelectType = $_POST['functionTel']; else $mobSelectType = '';

$people = new Peoples();
if(isset($_POST['firstname'])) $people->setFirstName($_POST['firstname']); else $people->setFirstName('');
if(isset($_POST['lastname'])) $people->setSecondName($_POST['lastname']); else $people->setSecondName('');
if(isset($_POST['functionPeop'])) $peopSelectType = $_POST['functionPeop']; else $peopSelectType = '';

$blackList = new PhonesFromBlackList();
if(isset($_POST['idPeople'])) $blackList->setIdPeople($_POST['idPeople']); else $blackList->setIdPeople('');
if(isset($_POST['idTelephone'])) $blackList->setIdTelephone($_POST['idTelephone']); else $blackList->setIdTelephone('');
if(isset($_POST['functionBlackList'])) $listSelectType = $_POST['functionBlackList']; else $listSelectType = '';



$connect1 = new MyConnect();
$con = $connect1->connect($config['host'],$config['db_user'],$config['db_password'],$config['db_name']);
$manPeople = new ManagerPeoples($con);
$manTelephone = new ManagerTelephone($con);
$manBlackList = new ManagerBlackList($con);
?>

<style>
    .forms div{
        width: 30%;
        display: inline-block;
        float: left;
    }
    .forms .telephones{
        margin: 0 10px;
        border-left: 2px solid black;
        border-right: 2px solid black;
        padding: 0 10px;
    }
    form input{
        width: 50%;
        margin-bottom: 15px;
        height: 25px;
        display: block;
    }
    form select{
        display: block;
        margin-bottom: 15px;
    }
    form button{
        height: 30px;
        width: 100px;
        background-color: red;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        display: block;
    }
    pre{
        width: 100%;
        min-height: 100px;
        background-color: blue;
        color: white;
        padding: 15px;
        clear: both;
    }
</style>
<div class="forms">
    <div class="peoples">
        <form method="post">
            <label for="firstname">First name</label>
            <input type="text" name="firstname">
            <label for="lastname">Second name</label>
            <input type="text" name="lastname">
            <input type="hidden" name="type" value="insert"/>
            <select name="functionPeop">
                <option name="insert" value="insert">insert</option>
                <option name="remove" value="remove">remove</option>
                <option name="update" value="update">update</option>
                <option name="find" value="find">find</option>
                <option name="findall" value="findall">findall</option>
                <option name="findby" value="findby">findby</option>
            </select>
            <button type="submit">Do it!!!</button>
        </form>
    </div>
    <div class="telephones">
        <form method="post" name="telephones">
            <label for="firstname">Brand device</label>
            <input type="text" name="brand">
            <label for="firstname">Model device</label>
            <input type="text" name="model">
            <label for="firstname">Type device</label>
            <input type="text" name="typedev">
            <label for="firstname">Phone's number</label>
            <input type="text" name="phonenumber">
            <label for="firstname">IMAI telephone</label>
            <input type="text" name="imai">
            <select name="functionTel">
                <option name="insert" value="insert">insert</option>
                <option name="remove" value="remove">remove</option>
                <option name="update" value="update">update</option>
                <option name="find" value="find">find</option>
                <option name="findall" value="findall">findall</option>
                <option name="findby" value="findby">findby</option>
            </select>
            <button type="submit">Do it!!!</button>
        </form>
    </div>
    <div class="black_list">
        <form method="post">
            <label for="idPeople">ID people</label>
            <select type="text" name="idPeople">
                <?php
                    $resMasPeop = $manPeople->findAll('Peoples');
                    foreach($resMasPeop as $value){
                        echo "<option value=".$value['id'].">".$value['id']."</option>";
                    };
                ?>
            </select>
            <label for="idTelephone">ID telephone</label>
            <select type="text" name="idTelephone">
                <?php
                    $resMasTel = $manTelephone->findAll('Telephones');
                    foreach($resMasTel as $value){
                        echo "<option value=".$value['id'].">".$value['id']."</option>";
                    };
                ?>
            </select>
            <select name="functionBlackList">
                <option name="insert" value="insert">insert</option>
                <option name="remove" value="remove">remove</option>
                <option name="update" value="update">update</option>
                <option name="find" value="find">find</option>
                <option name="findall" value="findall">findall</option>
                <option name="findby" value="findby">findby</option>
            </select>
            <button type="submit">Do it!!!</button>
        </form>
    </div>
</div>

<?php
    switch ($mobSelectType){
        case 'insert':
            $manTelephone->insert($mobTel);
            break;
        case 'remove':
            $manTelephone->remove($mobTel);
            break;
        case 'update':
            $manTelephone->update($mobTel);
            break;
        case 'find':
            $resMas = $manTelephone->find('Telephones', $mobTel->getImei());
            var_dump($resMas);
            break;
        case 'findall':
            $resMas = $manTelephone->findAll('Telephones');
            var_dump($resMas);
            break;
        case 'findby':
            $resMas = $manTelephone->findBy('Telephones', ['brand','model']);
            var_dump($resMas);
            break;
    }
    switch ($peopSelectType){
        case 'insert':
            $manPeople->insert($people);
            break;
        case 'remove':
            $manPeople->remove($people);
            break;
        case 'update':
            $manPeople->update($people);
            break;
        case 'find':
            $resMas = $manPeople->find('Peoples', $people->getFirstName());
            var_dump($resMas);
            break;
        case 'findall':
            $resMas = $manPeople->findAll('Peoples');
            var_dump($resMas);
            break;
        case 'findby':
            $resMas = $manPeople->findBy('Peoples', ['firstname' ,'lastname']);
            var_dump($resMas);
            break;
    }

    switch ($listSelectType){
        case 'insert':
            $manBlackList->insert($blackList);
            break;
        case 'remove':
            $manBlackList->remove($blackList);
            break;
        case 'update':
            $manBlackList->update($blackList);
            break;
        case 'find':
            $resMas = $manBlackList->find('BlackList', $blackList->getIdTelephone());
            var_dump($resMas);
            break;
        case 'findall':
            $resMas = $manBlackList->findAll('BlackList');
            var_dump($resMas);
            break;
        case 'findby':
            $resMas = $manBlackList->findBy('BlackList', ['id_telephone' ,'id_people']);
            var_dump($resMas);
            break;
    }