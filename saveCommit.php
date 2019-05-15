<?php
	include "databaseFunctions.php";
	include "dbConn.php";
	$commit = $_POST["commit"];
	$id = getFrominfo("currentID");
	$amount = getFromCommits($id, "amount");
	
	$value = "commit".$amount;
	
	setCommits($id, $value, $commit);
	$amount += 1;
	setCommits($id, "amount", $amount);
	$conn->query("alter table commits add commit" .$amount. " varchar(8000);");

	header("Location: index.php");
	die();
?>