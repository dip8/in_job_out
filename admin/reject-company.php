<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: index");
	exit();
}


require_once("../db.php");

if(isset($_GET)) {

	//Delete Company using id and redirect
	$sql = "UPDATE company SET active='0' WHERE id_company='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: companies");
		exit();
	} else {
		echo "Error";
	}
}