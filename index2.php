<?php
session_start(); 
if(empty($_SESSION['login'])) {
      header("Location: http://agz//index.php");
}
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
              echo "<li class='nav-item'  id='second'>
                       <a href='index1.php' class='nav-link'>Учебная работа</a>
                    </li>
                    <li class='nav-item active' id='third'>
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
          <h2 class="white-text py-3 pl-5">Научная работа</h2>
        </div>
      </div>
      <section>
        <div class="container my-4">
          <div class="card pb-5">
            <div class="card-body">
              <h2 class="text-center pt-3 pb-5 dark-orange-text font-weight-bold">Материалы</h2>
              <div class="row text-center">
                <div class="col-md-4 col-sm-12 mt-3">
                  <a href="#"><i class="fa fa-file fa-4x indigo-text"></i></a>
                  <h4 class="my-4 font-italic">Монографии</h4>
                  <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium laboriosam placeat culpa ipsam odit eveniet.</p>
                </div>
                <div class="col-md-4 col-sm-12 mt-3">
                  <a href="#"><i class="fa fa-archive fa-4x indigo-text"></i></a>
                  <h4 class="my-4 font-italic">Учебники</h4>
                  <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo eius ex accusamus sapiente vero veniam.</p>
                </div>
                <div class="col-md-4 col-sm-12 mt-3">
                  <a href="#"><i class="fa fa-graduation-cap fa-4x indigo-text"></i></a>
                  <h4 class="my-4 font-italic">Справочники</h4>
                  <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam excepturi placeat, corrupti quia et quaerat.</p>
                </div>
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


    
 

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    
</body>

</html>