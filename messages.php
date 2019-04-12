<?php 	
	require_once "lib/func.php";
	session_start();
	/*if (!checkUser($_SESSION["login"], $_SESSION["password"])) {
		header("Location: /");
		exit;
	}*/
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Личные сообщения</title>
 </head>
 <body>
 	<table>
 		<tr>
 			<td>От кого</td>
 			<td>Сообщение</td>
 			<td>Ответить</td>
 		</tr>
 		<?php
 			$new = getIdByLogin($_SESSION["login"]);
 			$myrow = getAllMessages($new);
 			$a = count($myrow);
 			for ($i = 0; $i < count($myrow); $i++) { 
 				echo "<tr>";
 				$from = getUserById($myrow[$i]["sender"]);
 				echo "<td><b>".$from["login"]."</b></td>";
 				echo "<td>".$myrow[$i]["message"]."</td>";
 				echo "<td>";
 				echo "<a href='smessage.php?to=".$from["id"]."' title='ответить'>Ответить</a>";
 				echo "</td>";
 				echo "</tr>";
 			}
 		?>
 	</table>
 </body>
 </html>