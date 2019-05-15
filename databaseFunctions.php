<?php
include "dbConn.php";
startup();

//
//Startup Functions
//

function getDBConn(){
	return $conn;
}

function startup(){
	global $conn;
	$val = $conn->query('select 1 from `commits` LIMIT 1');

	if($val !== FALSE){
		//echo "Table exists<br>";
	}
	else{
		$sql = "create table commits(id int, amount int, commit1 varchar(8000));";
		if($conn->query($sql) !== TRUE){
			//echo "Error: Had a hard time creating table 'stats'<br>";
		}else{
			//echo "Table does not exist! Creating Table...<br>";
		}
	}
	
	$val = $conn->query('select 1 from `info` LIMIT 1');

	if($val !== FALSE){
		//echo "Table exists<br>";
	}
	else{
		$sql = "create table info(value varchar(255), num int);";
		if($conn->query($sql) !== TRUE){
			//echo "Error: Had a hard time creating table 'workers'<br>";
		}else{
			//echo "Table does not exist! Creating Table...<br>";
		}
	}
}

//
//Main Getters and Setters
//

function getFromCommits($id, $value){
	global $conn;
	$sql = "select $value from commits where id='$id'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		if(empty($row)){
			return NULL;
		}
		return $row[$value];
	}
	return NULL;
}

function setCommits($id, $value, $amount){
	global $conn;
	$val = $conn->query("select $value from `commits` where id=$id");

	if(!empty($val->fetch_assoc())){
		$sql = "update commits set $value='$amount' where id=$id";
	}else{
		$sql = "insert into commits (id, amount, commit1) values ($id, 1, '$amount')";
	}
	$conn->query($sql);
}

function getFrominfo($value){
	global $conn;
	$sql = "select num from info where value='$value'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		if(empty($row)){
			return NULL;
		}
		return $row["num"];
	}
	return NULL;
}

function setInfo($value, $amount){
	global $conn;
	$val = $conn->query("select num from `info` where value='$value'");
	
	if(!empty($val->fetch_assoc())){
		$sql = "update info set num=$amount where value='$value'";
	}else{
		$sql = "insert into info (value, num) values ('$value', $amount)";
	}
	
	$conn->query($sql);
}
?>