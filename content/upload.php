<?php
if (is_uploaded_file($_FILES["newFile"]["tmp_name"])) {
	$uploaddir = '../uploads/';
	$uploadfile = $uploaddir . basename($_FILES['newFile']['name']);

 	move_uploaded_file($_FILES["newFile"]["tmp_name"], $uploadfile);

 	$name = $_FILES["newFile"]["name"];
 	$fol_id = $_POST["folId"];
 	$type = $_FILES['newFile']['type'];
 	if ($type = 'application/msword' or $type = 'application/vnd.ms-powerpoint' or $type = 'application/pdf') {
 		include ("db.php");

		$result = mysqli_query($db, "INSERT INTO uploadfiles (Fol_Id,Doc_Name) VALUES ('$fol_id','$name')");

 		echo "<br>Файл успешно загружен<br><a href='http://agz//index1.php'>Вернуться к списку предметов</a>";
 	} else {
 		echo "Неверный формат файла";
 	}

 	
 } else {
 	echo "<br>Ошибка загрузки<br><a href='http://agz//index1.php'>Вернуться к списку предметов</a>";
 }

 ?>