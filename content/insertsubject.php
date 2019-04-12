<?php 
if (isset($_POST['subjectName'])) {
	$subjectName = htmlentities($_POST['subjectName']); if ($subjectName == '') {
		unset($subjectName);
	}
}
$subjectName = stripcslashes($subjectName);
$subjectName = trim($subjectName);
include ("db.php");

if ($result = mysqli_query($db, "INSERT INTO subjects (Sub_Name) VALUES ('$subjectName')")) {
	echo "Вы успешно добавили предмет <br> <a href='../index1.php'>Вернуться к выбору предмета</a>";
} else {
	echo "Что то пошло не так <br> <a href='../index1.php'>Вернуться к выбору предмета</a>";
}
 ?>
