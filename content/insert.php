<?php 
if (isset($_POST['folderName'])) {
	$folderName = htmlentities($_POST['folderName']); if ($folderName == '') {
		unset($folderName);
	}
}
$folderName = stripcslashes($folderName);
$folderName = trim($folderName);
$sub_id = $_POST['sub_id'];
include ("db.php");

if ($result = mysqli_query($db, "INSERT INTO folders (Sub_Id, Fol_Name) VALUES ('$sub_id', '$folderName')")) {
	echo "Вы успешно создали папку <br> <a href='../index1.php'>Вернутсья к выбору предмета</a>";
} else {
	echo "Что то пошло не так <br> <a href='index1.php'>Вернутсья к выбору предмета</a>";
}
 ?>
