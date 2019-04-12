<?php 
session_start();
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
                    <li class='nav-item' id='third'>
                       <a href='index2.php' class='nav-link'>Методическая работа</a>
                    </li>";
             } 
              ?>
             <li class="nav-item active">
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
                    <a href='' class='nav-link' data-toggle='modal' data-target='#elegantModalForm'>Войти</a>
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
              <div class="row">
                <div class="col"></div>
                <div class="col-10 d-flex flex-column">
                  <h2 class="text-center pt-3 pb-5 dark-orange-text font-weight-bold">Научно-исследовательские и опытно-конструкторские работы</h2>
                  <p class="pt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore velit distinctio corporis modi, dignissimos repellendus perspiciatis eveniet voluptas obcaecati, officiis minima aliquam rerum libero aspernatur, eius accusamus et illo veritatis. Doloremque nesciunt omnis porro officia alias tempora aperiam atque vitae quidem provident a illum totam eius, itaque aliquam sint. Veritatis laborum incidunt neque natus eius obcaecati recusandae, voluptatum quisquam sapiente vitae saepe iusto id, non nisi accusamus dignissimos! Consequatur dicta eos asperiores doloremque pariatur repellat rerum obcaecati sed earum maiores numquam natus, nisi odit ducimus error totam quos ipsa, expedita voluptatem quas sunt vel! Veritatis expedita, odio officiis atque ipsa.</p>
                </div>
                <div class="col"></div>
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

<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content form-elegant">
      <!--Header-->
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Войти</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body mx-4">
        <!--Body-->
        <div class="md-form mb-5">
          <form action="registration/test.php" method="post">
          <input type="text" id="login" class="form-control validate" name="login">
          <label data-error="wrong" data-success="right" for="login">Логин</label>
        </div>

        <div class="md-form pb-3">
          <input type="password" id="password" class="form-control validate" name="pass">
          <label data-error="wrong" data-success="right" for="password">Пароль</label>
        </div>

        <div class="text-center mb-3">
          <input type="submit" name="submit" value="Войти">
        </div>
        </form>
      </div>
      <!--Footer-->
    </div>
    <!--/.Content-->
  </div>
</div>
</div>
    
 

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