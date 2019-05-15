<?php
	include "databaseFunctions.php";
	$id = (int) $_POST["id"];
	$actualid = getFrominfo("actualID");
	if($actualid == NULL){
		$actualid = 1;
		setInfo("actualID", $actualid);
	}
	setInfo("currentID", $actualid);
	if($id <= $actualid){
		setInfo("currentID", $id);
	}

	header("Location: index.php");
	die();
?>