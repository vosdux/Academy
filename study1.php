<?php 
session_start();
$get = $_GET['id'];
include ("content/db.php");
$login = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>АГЗ</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/tree.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <header>
     <div class="container-fluid  text-center white-text" id="logo">
       <div class="row">
         <div class="col-lg-2 col-md-12">
           <img src="img/logo_agz.png" alt="" class="pt-3 pb-3 pl-2">
         </div>
         <div class="col"></div>
         <div class="col-lg-8 col-md-12 pt-4">
           <h1>Кафедра</h1>
           <h1>Информационных систем и технологий</h1>
         </div>
       </div>
     </div>
     <nav class="navbar navbar-expand-lg navbar-dark">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" arial-lable="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarContent">
           <ul class="navbar-nav">
             <li class="nav-item">
               <a href="index.php" class="nav-link">Воспитательная работа</a>
             </li>
             <?php
             if (!empty($_SESSION['login']) or !empty($_SESSION['id'])) {
              echo "<li class='nav-item active'  id='second'>
                       <a href='index1.php' class='nav-link'>Учебная работа</a>
                    </li>
                    <li class='nav-item' id='third'>
                       <a href='index2.php' class='nav-link'>Методическая работа</a>
                    </li>";
             } 
              ?>
             <li class="nav-item" id="four">
               <a href="index3.php" class="nav-link">Научная работа</a>
             </li>
             <li class="nav-item" id="five">
               <a href="index4.php" class="nav-link">Аккредитация</a>
             </li>
           </ul>
           <ul class="navbar-nav ml-auto">
            <?php 
            if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
              echo "<li class='nav-item mr-5 d-flex'>
                    <a href='' class='nav-link' data-toggle='modal' data-target='#modalLoginForm'>Войти</a>
                    </li>";
            }
            else {
              if ($login == 'teacher') {
                echo "<li class='nav-item mr-5 d-flex'>
                    <p class='login-p'>Вы вошли как ПРЕПОДАВАТЕЛЬ</p>
                    <a href='registration/unset.php' class='nav-link'>Выйти</a></p>
                    </li>";
              } else {
                echo "<li class='nav-item mr-5 d-flex'>
                    <p class='login-p'>Вы вошли как СТУДЕНТ</p>
                    <a href='registration/unset.php' class='nav-link'>Выйти</a></p>
                    </li>";
              }
               
            }
             ?>
           </ul>
         </div>
       </div>
     </nav>
    </header>
    <main>
      <div class="container-fluid peach-gradient">
        <div class="row">
          <h2 class="white-text py-3 pl-5">Введение в специальность</h2>
        </div>
      </div>
      <nav class="breadcrumb mt-3">
        <a class="breadcrumb-item" href="index1.php">Предметы</a>
        <span class="breadcrumb-item active">
          <?php 
            $querryTitle = mysqli_query($db, "SELECT Sub_Name FROM subjects WHERE Sub_Id = '$get'");
            $myrowTitle = mysqli_fetch_array($querryTitle);
            echo "$myrowTitle[0]";  
          ?>
        </span>
      </nav>
      <div class="container">
        <div class="card mb-5">
          <div class="card-body">
            <ol class="tree" id="mainList">
            <?php
            $querry = mysqli_query($db, "SELECT MAX(Fol_Id) FROM folders");
            $myrow = mysqli_fetch_array($querry);

            $filequerry = mysqli_query($db, "SELECT MAX(Doc_Id) FROM uploadfiles");
            $filemyrow = mysqli_fetch_array($filequerry);

            for ($i=0; $i < $myrow[0]; $i++) {
              $j = $i + 1;
              $name = mysqli_query($db, "SELECT Fol_Name FROM folders WHERE Fol_Id = '$j' and Sub_Id = '$get'");
              $myrowname = mysqli_fetch_array($name);
              if ($myrowname == '') {
                continue; 
              } else {
              echo "<li class='tree'>
                <label for='folder$j'>$myrowname[0]</label> <input type='checkbox' id='folder$j' /> 
                <ol>";
                for ($k=0; $k < $filemyrow[0]; $k++) { 
                  $l = $k + 1;
                  $folderName = mysqli_query($db, "SELECT Doc_Name FROM uploadfiles WHERE Doc_Id = '$l' and Fol_Id = '$j'");
                  $rowFolderName = mysqli_fetch_array($folderName);
                  if ($rowFolderName == '') {
                    continue; 
                  } else {
                  echo "<li class='file'><a href='uploads/$rowFolderName[0]' target='_blank'>$rowFolderName[0]</a>
                    <a><i class='fa fa-download green-text fa-2x download'></i></a>";

                    if ($_SESSION['login'] == 'teacher') {
                      echo "<form action='content/deletefile.php' method='post' class='trash'>
                        <input type='text' hidden name='deleteDocId' value='$l'>
                        <i class='fa fa-trash fa-2x red-text delete-btn-wrapper' >
                          <input type='submit' class='delete-btn' name='deleteDocIdSubmit' value='Удалить'>
                        </i>
                      </form>";
                    }

                      echo "</li>";}
                }
                if ($_SESSION['login'] == 'teacher') {
              echo "
              <li class='file'>
                  <button class='addDocumentButton' type='submit' id='$j' data-toggle='modal' data-target='#basicExampleModal1'>Добавить</button></li>";
                }
                echo "
                </ol>
              </li>";
              }
            }
            echo "</ol>";

            if ($_SESSION['login'] == 'teacher') {
              echo "<div class='row pt-5'>
              <div class='col-lg-3'>
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#basicExampleModal' id = '$get'>
                Добавить папку
                </button>
              </div>
              <div class='col-lg-3'>
                <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#basicExampleModal2'>
                Удалить Папку
               </button>
              </div>
            </div>";
            }
             ?>
           

             
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer class="page-footer font-small mt-5 pt-4 blue-gr">
    <div class="container text-center text-md-left">
      <div class="row">
        <div class="col"></div>
        <div class="col-md-8 mt-md-0 mt-3 text-center font-small-2">
          <p>© Федеральное государственное бюджетное военное образовательное учреждение высшего образования
          «Академия гражданской защиты Министерства Российской Федерации по делам гражданской обороны, чрезвычайным ситуациям и ликвидации последствий стихийных бедствий»</p>
        </div>
        <div class="col"></div>
      </div>
    </div>
    <div class="footer-copyright text-center py-3">©2018:
      <a href="mailto:karpuxov.a@mail.ru" target="_blank">karpuxov.a@mail.ru</a>
    </div>
  </footer>

<!-- Modal -->
<?php 
if ($_SESSION['login'] == 'teacher') {
  echo "<div class='modal fade' id='basicExampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Введите название папки</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <form method='post' action='content/insert.php' id='formInsert'>
        <div class='modal-body'>
            <input type='text' name='folderName' id='folderName' placeholder='Название папки' required>
            <input type='text' name='sub_id' value ='$get' hidden>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Закрыть</button>
          <input type='submit' name='submit' class='btn btn-primary' value='Создать'/>
      </div>
      </form>
    </div>
  </div>
</div>


<div class='modal fade' id='basicExampleModal1' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel1' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel1'>Выберите документ</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <form action='content/upload.php' method='post' enctype='multipart/form-data'>
        <div class='modal-body'>
          <div class='d-flex flex-column'> 
            <input type='text' name='folId' class='folId' hidden>
            <p></p>
            <p><input type='file' name='newFile' id='newFile'></p>
            <p></p>
          </div>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Закрыть</button>
          <input type='submit' name='submit1'  class='btn btn-primary' value='Загрузить'>
      </div>
      </form>
    </div>
  </div>
</div>

<div class='modal fade' id='basicExampleModal2' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Удаление папки</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <form action='content/deletefolder.php' method='post'>
        <div class='modal-body'>
            <div class='d-flex flex-column'>
            <p class='mb-0'><label for='folder'>Выбирите папку которую хотите удалить:</label></p>
            <p><select name='folderD' id='folderD'>"; 
              for ($c=0; $c < $myrow[0]; $c++) {
              $d = $c + 1; 
                $selectFolderNameD = mysqli_query($db, "SELECT Fol_Name FROM folders WHERE Fol_id = '$d' AND Sub_Id = '$get'");
                $myrowSelectFolderNameD = mysqli_fetch_array($selectFolderNameD);
                if ($myrowSelectFolderNameD == '') {
                continue; 
                } else {
                echo "<option value='$d'>$myrowSelectFolderNameD[0]</option>";
                }
              }
              echo "</select></p>
            <p></p>
            <p></p>
          </div>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Закрыть</button>
          <input type='submit' name='submit2' class='btn btn-danger' value=''Удалить'>
      </div>
      </form>
    </div>
  </div>
</div>";
}
 ?>


    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.addDocumentButton').each(function() {
          $(this).on('click', function() {
            $('.folId').attr('value', $(this).attr('id'));
          });
        });
        
      });
    </script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    
</body>

</html>
