<?php 
include ("db.php");
$id = $_POST["subjectD"];
$result = mysqli_query($db, "DELETE FROM subjects WHERE Sub_Id = '$id'");
$resultD = mysqli_query($db, "DELETE FROM folders WHERE Sub_Id = '$id'");
$resultDF = mysqli_query($db, "DELETE FROM uploadfiles WHERE Sub_id = '$id'");
echo "Вы успешно удалили раздел! <br> <a href='../index1.php'>На страницу выбора предмета</a>";

 ?>