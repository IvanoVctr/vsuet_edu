<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="ru" style="height: 100% !important;">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <title>Vsuet Edu</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/lightbox.css">
</head>

<body style="height: 100% !important;" class="d-flex flex-column">
   <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="index.php">Вгуит_лекции</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a id="viewLectures">Лекции</a></li>
        <li><a id="viewPractice">Практика</a></li>
      </ul>
    </nav>
  </header>
  <!--end header-->

  <!-- user page-->
  <section class="user-page">
    <div class="container">
      <div class="row">
        <div class="user-main">
          <div class="head">
            <h3>Профиль:</h3>
            <hr style="border: 1px solid #9c9c9c; width: 100%; margin-top: 10px;">
          </div>
          <div class="user-page-block">
            <div class="user-info">
              <img class="user-img" width="140" height="140" src="assets\images\user.png" alt="user--v1"/>
              <hr style="border: 1px solid #9c9c9c; width: 80%; margin-top: 10px;">
              <label>Логин:</label>
              <h6><?php echo $_SESSION['username'];?></h6>
              <label>Email:</label>
              <h6><?php echo $_SESSION['email'];?></h6>
              <label>Дата регистрации:</label>
              <h6><?php echo $_SESSION['created_at'];?></h6>
              <input type="submit" value="Выход" class="btn-exit btn btn-danger" onclick="logout()">
            </div>
            <div class="data-block">
              <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                      aria-controls="panelsStayOpen-collapseTwo">
                      Заметки: <img сlass="open-accordeon" src="assets/images/open.png"></button>
                  </h2>
                  <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                      <a>Ajax.txt</a>
                      <hr>
                      <a>CMS.txt</a>
                      <hr>
                      <a>Основы_php.txt</a>
                      <hr>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                      aria-controls="panelsStayOpen-collapseThree">
                      Отчеты: <img сlass="open-accordeon" src="assets/images/open.png"></button>
                  </h2>
                  <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                      <a>Отчет-Ajax.docx</a>
                      <hr>
                      <a>Отчет-Ajax.docx</a>
                      <hr>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- end user page-->
  
  <!-- footer -->
  <footer style="bottom: 0;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>Сайт подготовлен в качестве дипломной работы ФГБОУ ВО "ВГУИТ"</p>
          <p> &copy; Иванов В. В.</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- end footer -->
</body>

<!-- Script -->
<script>
  document.getElementById('viewLectures').addEventListener('click', () => {
    window.location.href = 'lectures.php';
  });
</script>
<script>
  document.getElementById('viewPractice').addEventListener('click', () => {
    window.location.href = 'practice.php';
  });
</script>

<!-- Script end -->
<script>
    function logout() {
    window.location.href = 'logout.php';
}
</script>
</html>