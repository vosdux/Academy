<?php 
include ("db.php");
$id = $_POST["deleteDocId"];
$resultDeleteFile = mysqli_query($db, "DELETE FROM uploadfiles WHERE Doc_Id = '$id'");
echo "Файл успешно удален! <br><a href='../index1.php'>Вернуться на страницу выбора предмета</a>";
 ?>