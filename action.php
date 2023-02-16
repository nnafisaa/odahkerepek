<?php

//action.php

$conn= new mysqli('localhost','root','','fos_db')or die("Could not connect to mysql".mysqli_error($con));


if(isset($_POST["action"]))
{
	if($_POST["action"] == "insert")
	{
		$query = "
		INSERT INTO users (name, username, password, type) VALUES ('".$_POST["name"]."', '".$_POST["username"]."' , '".$_POST["password"]."' , '".$_POST["type"]."')
		";
		$statement = $conn->prepare($query);
		$statement->execute();
		echo '<p>Data Inserted...</p>';
	}
	
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE users 
		SET name = '".$_POST["name"]."', 
		username = '".$_POST["username"]."',
		password = '".$_POST["password"]."', 
		type = '".$_POST["type"]."'
		WHERE id = '".$_POST["hidden_id"]."'
		";
		$statement = $conn->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM users WHERE id = '".$_POST["id"]."'";
		$statement = $conn->prepare($query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
	}
}

?>