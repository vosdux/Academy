<?php 
	require_once "lib/func.php";
	session_start();
	/*if (!checkUser($_SESSION["login"], $_SESSION["password"])) {
		header("Location: /");
		exit;
	}*/

	$user = getUserById($_GET["to"]);
	if (isset($_POST["smessage"])) {
		$message = $_POST["message"];
		$to = $_POST["to"];
		$from = getIdByLogin($_SESSION["login"]);
		addMessage ($from, $to, $message);
		$_SESSION["pm"] = 1;

	}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Отправить сообщение</title>
 </head>
 <body>
 	<h1>Отправить сообщение пользователю <?php echo $user[$login]; ?></h1>
 	<?php 
 		if ($_SESSION["pm"] == 1) {
 			echo "<p style='color: red;'>Ваше сообщение отправлено</p>";
 			unset($_SESSION["pm"]);
 		}
 	 ?>
 	<form action="smessage.php?to=<?php echo $_GET['to']; ?>" method="post">
 		 <p>
 			<label for="">Ваше сообщение</label>
 			<br>
 			<textarea name="message" id="" cols="40" rows="10"></textarea>
 		</p>
 		<p>
 			<input type="hidden" name="to" value="<?php echo $_GET['to']; ?>">
 			<input type="submit" name="smessage" value="Отправить">
 		</p>
 	</form>
 </body>
 </html>