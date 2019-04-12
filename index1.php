<?php
session_start(); 
if(empty($_SESSION['login'])) {
      header("Location: http://agz//index.php");
}
$login = $_SESSION['login'];
include("registration/db.php");
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
             <li class="nav-item">
               <a href="index3.php" class="nav-link">Научная работа</a>
             </li>
             <li class="nav-item">
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
          <h2 class="white-text py-3 pl-5">Учебная работа</h2>
        </div>
      </div>
      <section>
        <div class="container my-4">
          <div class="card">
            <div class="card-body sp">
              <h2 class="text-center pt-3 dark-orange-text font-weight-bold">Список предметов</h2>
              <div class="row">
                <div class="col"></div>
                <div class="col-10">
                  <ul id="subjects" class="pt-4 ">
                  <?php 
                  include ("content/db.php");
                  $querrySub = mysqli_query($db, "SELECT MAX(Sub_Id) FROM subjects");
                  $myrowSub = mysqli_fetch_array($querrySub);
                  for ($i=0; $i < $myrowSub[0]; $i++) {
                  $j = $i + 1;
                  $nameSub = mysqli_query($db, "SELECT Sub_Name FROM subjects WHERE Sub_Id = '$j'");
                  $idSub = mysqli_query($db, "SELECT Sub_Id FROM subjects WHERE Sub_Id = '$j'");
                  $myrowIdSub = mysqli_fetch_array($idSub);
                  $myrownameSub = mysqli_fetch_array($nameSub);
                  if ($myrownameSub == '') {
                  continue; 
                  } else {
                    echo "<li>
                    <a id='$myrowIdSub[0]' class='subject'>$myrownameSub[0]</a>
                    </li>";
                  }
                }
                   ?>
                </ul>
                <?php 
                  if ($_SESSION['login'] == 'teacher') {
                    echo "<div class='row pt-5'>
                  <div class='col-lg-6 col-md-12 text-center'>
                    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#basicExampleModal'>
                    Добавить раздел
                    </button>
                  </div>
                  <div class='col-lg-6 col-md-12 text-center'>
                  <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#basicExampleModal2'>
                  Удалить раздел
                </button>
                  </div>
                </div>";
                  }
                 ?> 
                </div>
                <div class="col"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
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
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Введите название предмета</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="content/insertsubject.php" id="formInsertSubj">
        <div class="modal-body">
            <input type="text" name="subjectName" id="subjectName" placeholder="Название предмета" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <input type="submit" name="submit" class="btn btn-primary"value="Создать"/>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="basicExampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Удаление предмета</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="content/deletesubject.php" method="post">
        <div class="modal-body">
            <div class="d-flex flex-column">
            <p class="mb-0"><label for="folder">Выбирите раздел который хотите удалить:</label></p>
            <p><select name="subjectD" id="subjectD">
              <?php 
              for ($c=0; $c < $myrowSub[0]; $c++) {
              $d = $c + 1; 
                $selectSubjectNameD = mysqli_query($db, "SELECT Sub_Name FROM subjects WHERE Sub_id = '$d'");
                $myrowselectSubjectNameD = mysqli_fetch_array($selectSubjectNameD);
                if ($myrowselectSubjectNameD == '') {
                continue; 
                } else {
                echo "<option value='$d'>$myrowselectSubjectNameD[0]</option>";
                }
              }
               ?>
            </select></p>
            <p></p>
            <p></p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <input type="submit" name="submit2" class="btn btn-danger" value="Удалить">
      </div>
      </form>
    </div>
  </div>
</div>


 

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
      $(".subject").click(function() {
        var id = $(this).attr('id');
        location.href = "http://agz//study1.php?id=" + id;
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

