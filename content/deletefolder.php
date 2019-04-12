<?php 
include ("db.php");
$id = $_POST["folderD"];
$result = mysqli_query($db, "DELETE FROM folders WHERE Fol_Id = '$id'");
$resultD = mysqli_query($db, "DELETE FROM uploadfiles WHERE Fol_Id = '$id'");
echo "Вы успешно удалили папку! <br> <a href='../index1.php'>На страницу выбора предмета</a>";

 ?>