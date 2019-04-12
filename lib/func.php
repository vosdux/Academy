<?php 
	function connectDB() 
	{
		$db = new mysqli("localhost", "root", "123", "agz");
		$db->set_charset('utf-8');
		return $db;
	}
	function closeDB($mysqli) 
	{
		$mysqli->close();
	}
	function checkUser($login, $password)
	{
		if (($login == "") || ($password == "")) return false;
		$db = connectDB();
		$result = mysqli_query($db, "SELECT Password FROM users WHERE Login= '$login'");
		$user = mysqli_fetch_assoc($result);
		$real_password = $user['password'];
		closeDB($db);
		return $real_password == $password;
		
	}
	function resulToArray($result) 
	{
		$results = array();
		while (($myrow = mysqli_fetch_assoc($result)) != false) {
			$results[] = $myrow;
		}
		return $results;
	}

	function getUserById($id)
	{
		$db = connectDB();
		$result = mysqli_query($db, "SELECT * FROM users WHERE User_Id='$id'");
		$myrow = mysqli_fetch_array($result);
		closeDB($db);
		return $myrow;
	}

	function getIdByLogin($login)
	{
		$db = connectDB();
		$result = mysqli_query($db, "SELECT User_Id FROM users WHERE Login='$login'");
		$myrow = mysqli_fetch_array($result);
		closeDB($db);
		return $myrow["User_Id"];
	}

	function addMessage($from, $to, $message)
	{
		$db = connectDB();
		$db = mysqli_query("INSERT INTO messages ('sender', 'reciever', 'message') VALUES ('$from', '$to', '$message')");
		closeDB($db);
	}

	function getAllMessages($to) {
		$db = connectDB();
		$result = mysqli_query($db, "SELECT * FROM messages WHERE reciever = '$to'");
		
		closeDB($db);
		return resulToArray($result);
	}

	function getAllUsers($none)
	{
		$db = connectDB();
		$querry = mysqli_query($db, "SELECT MAX(User_Id) FROM users");
        $maxid = mysqli_fetch_assoc($querry);
        $results = array();
        for ($i = 0; $i < $maxid['MAX(User_Id)']; $i++) {
        	$k = $i + 1; 
        	$querry = mysqli_query($db, "SELECT User_Id, Login FROM users WHERE User_Id = '$k' AND User_Id <> '$none'");
        	$row = mysqli_fetch_assoc($querry);
        	if (empty($row)) {
        		continue; 
        	} else {
        		$results[$i] = $row;
        	}
        }
        return $results;
	}


 ?>