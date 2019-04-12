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
    <title>Кафедра информационных систем и технологий</title>
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
             <li class="nav-item active">
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
                    <a href='' class='nav-link' data-toggle='modal' data-target='#elegantModalForm'>Войти</a>
                    </li>";
            }
            else {
              if ($login == 'teacher') {
                echo "<li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle login-p' data-toggle='dropdown' href='#' role='button' aria-haspopup='true'
                          aria-expanded='false'>Вы вошли как ПРЕПОДАВАТЕЛЬ</a>
                        <div class='dropdown-menu'>
                          <a class='dropdown-item' href='messages.php'>Сообщения</a>
                          <a class='dropdown-item' href='userlist.php'>Написать</a>
                        </div>
                      </li>

                <li class='nav-item mr-5 d-flex'>
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
          <h2 class="white-text py-3 pl-5">Воспитательная работа</h2>
        </div>
      </div>
      <section>
        <div class="container my-4">
          <div class="card">
            <div class="card-body">
              <h2 class="text-center pt-3 dark-orange-text font-weight-bold">О кафедре</h2>
              <div class="row">
                <div class="col"></div>
                <div class="col-10 d-flex flex-column">
                  <div class="text-justify">
                    <p class="grey-text pt-4 ">Свой славный путь кафедра начала 22 декабря 1994 года из цикла «Автоматизации управления, связи и оповещения» Высших центральных офицерских курсов ГО СССР, на котором читались учебные дисциплины, связанные с проблематикой связи и оповещения, а также по автоматизации управления.</p>
                    <p class="pt-2">На базе этого цикла была образована кафедра «Управления и автоматизации в РСЧС», начальником которой стал полковник Чистяков Виталий Иванович.</p>
                    <p>На кафедре была создана лаборатория вычислительной техники.</p>
                    <p>С января 1996 года начальником кафедры стал полковник Ярыгин Сергей Владимирович.</p>
                    <p>В 1998 году произошло объединение кафедры «Управления и автоматизации в РСЧС» и кафедры «Связи и оповещения в РСЧС», образовавших новую кафедру «Управления, автоматизации и связи в РСЧС». ВРИД начальника кафедры стал майор Комаров А.В. (с 1999 года - начальник кафедры).</p>
                    <p>В 1998 году в состав кафедры временно вошла лаборатория «Специального математического и программного обеспечения».</p>
                    <p>В сентябре 2001 года из кафедры «Управления, автоматизации и связи в РСЧС» были образованы кафедры «Информационных технологий и систем управления» и «Связи и оповещения».</p>
                    <p>Первым начальником кафедры ИТСУ в декабре 2001 года был назначен кандидат технических наук, старший научный сотрудник Яковлев Олег Владимирович.</p>
                    <p>В 2004 году в рамках специальности «Прикладная математика» была введена специализация “Информационные технологии управления в системах предупреждения и ликвидации чрезвычайных ситуаций”.</p>
                    <p>В 2007-2008 гг. кафедра проделала большую работу по открытию в Академии современной перспективной специальности «Информационные системы и технологии». Первый набор по ней осуществлен в 2009 году.</p>
                    <p>В связи с проводимыми организационно-штатными мероприятиями, в Академии, состав и структура кафедры изменились. Кафедра стала называться Кафедра Информационных систем и технологий.</p>
                    <p>Кафедра Информационных систем и технологий является выпускающей по специальностям «Прикладная математика» и «Информационные системы и технологии».</p>
                    <p>Кафедра является одной из ведущих в Академии. Это обусловлено тем, что выпускники Академии по кафедре: инженеры-математики и инженеры по специальности «Информационные системы и технологии», - должны выполнять свои задачи в условиях широкого применения в МЧС России средств вычислительной техники в рамках автоматизированной информационно-управляющей системы АИУС РСЧС. Для этого выпускникам необходимо, понимая сущность процессов возникновения и ликвидации ЧС, уметь осуществлять постановку задач, подлежащих автоматизации, их формализацию, разработку математических моделей, алгоритмизацию и программирование, а также самостоятельно решать многочисленные вопросы, связанные с применением информационных технологий в повседневной деятельности РСЧС.</p>
                  </div>
                  <h2 class="text-center mt-5 dark-orange-text font-weight-bold">Ссылки на образовательные документы</h2>
                  <div class="row pb-5 pt-3 text-center">
                    <div class="col-6 d-flex flex-column justify-content-center align-items-center">
                      <a href="documents/Pologenie_pologhenie_o_kafedre_N31.pdf" target="_blank" class="mt-2"><img src="img\icon_pdf.jpg" alt="" class="mr-2 mb-2">Положение о кафедре информационных систем и технологий</a>  
                      <a href="#" class="mt-2">Образовательный документ №2</a>
                      <a href="#" class="mt-2">Образовательный документ №3</a>
                    </div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-center">
                      <a href="#" class="mt-2">Образовательный документ №1</a>
                      <a href="#" class="mt-2">Образовательный документ №2</a>
                      <a href="#" class="mt-2">Образовательный документ №3</a>
                    </div>
                  </div>
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
<!-- Modal -->



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