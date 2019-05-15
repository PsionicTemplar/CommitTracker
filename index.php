<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Commit Tracker</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<!--<link href="index.css" type="text/css" rel="stylesheet" />-->
	</head>
	
	<form id="newCommit" action="newCommit.php" method="get">
		<input type="submit" id="newCommitButton" value="New Commit">
	</form>
	<br>
	<br>
	<form id="loadCommit" action="loadCommit.php" method="post">
		Commit Id
		<br>
		<input type="text" id="loadCommitID" name="id" autocomplete="off">
		<br>
		<input type="submit" id="loadCommitButton" value="Load Commit">
	</form>
	<br>
	
	<?php
		include "databaseFunctions.php";
		$id = getFrominfo("currentID");
		if($id !== NULL){
			echo "<form id=\"enterCommit\" action=\"saveCommit.php\" method=\"post\">
				Commit Message (Current Commit Id: " . $id . ")
				<br>
				<input type=\"text\" id=\"enterCommitMessage\" name=\"commit\" autocomplete=\"off\">
				<br>
				<input type=\"submit\" id=\"enterCommitButon\" value=\"Submit Commit\">
			</form>";
			echo "<p id=\"commitOutput\">
			git commit -m '".$id."
			<br>";
			$amount = getFromCommits($id, "amount");
			for($i = 1; $i < $amount; $i++){
				$name = "commit".$i;
				$commit = getFromCommits($id, $name);
				echo "-".$commit."<br>";
			}
			echo "'
			</p>";
		}
		
	?>

</html>