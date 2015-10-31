<?php

ini_set("display_errors", 1);

require __DIR__ . '/../config/autoload.php';

if (isset($_SESSION['login'])){
    header("Location: /AddEntity.php ");
}
header("Location: /user ");

