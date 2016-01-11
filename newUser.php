<?php 
require_once 'header.php';

if (isset($_POST)) {	
	$newcustomer = new Customer($_POST);
	$newcustomer->printCustomer();
	$newcustomer->addCustomer($database);

	header("location:MainPage.php")
}
?>