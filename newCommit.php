<?php
	include "databaseFunctions.php";
	$id = getFrominfo("actualID");
	if($id == NULL){
		$id = 1;
		setInfo("actualID", $id);
	}else{
		$id += 1;
		setInfo("actualID", $id);
	}
	setInfo("currentID", $id);

	setCommits($id, "id", "");

	header("Location: index.php");
	die();
?>