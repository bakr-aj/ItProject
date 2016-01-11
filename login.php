<?php
require_once 'header.php';

Engine::login($database);
if ($_SESSION['logedin']=='true') {
	//header("Location:MainPage.php");
}

?>