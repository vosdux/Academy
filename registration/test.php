<?php 
session_start();
if (isset($_POST['login'])) { $login = htmlentities($_POST['login']); if ($login == '') { unset($login);}} 
if (isset($_POST['pass'])) { $pass = htmlentities($_POST['pass']); if ($pass == '') { unset($pass);}}

$login = stripslashes($login);
$pass = stripslashes($pass);
$login = trim($login);
$pass = trim($pass);

include ("db.php");

$result = mysqli_query($db, "SELECT * FROM users WHERE Login = '$login'");
$myrow = mysqli_fetch_array($result);

$hash = $myrow['Password'];

if (empty($hash)) {
	exit("неверный логин");
}
else {
	if (password_verify($pass, $hash)) {
		$_SESSION['login'] = $myrow['Login'];
		$_SESSION['id'] = $myrow['User_Id'];
		header("Location: http://agz//index.php");
	}
	else{
		exit('неверный пароль');
	}
}

 ?>