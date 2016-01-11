<?php
require_once 'header.php';
// var_dump($_POST);
// echo "<br/>";
// var_dump($_SESSION['Customer']->getCustomer());
$_SESSION['Customer']->updateCustomer($database,$_POST);
?>