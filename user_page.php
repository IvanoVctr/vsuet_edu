<!DOCTYPE html>
<html lang="ru">
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
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
</head>
<body>
<!--header-->
<header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="">Вгуит lectures</a>
    </div>
</header>
<!--end header-->

<!-- user page-->
<section class="user-page">
  <div class="user"></div>
  <div id="notes-list"></div>
<script>
    // Получение списка заметок пользователя
    fetch('http://localhost/vsuet_edu/public/get_notes.php')
        .then(response => response.json())
        .then(notes => {
            // Отображение списка заметок
            const notesList = document.getElementById('notes-list');
            notes.forEach(note => {
                const noteItem = document.createElement('li');
                noteItem.textContent = `${note.lecture_title}: ${note.note_text}`;
                notesList.appendChild(noteItem);
            });
        });
</script>
</section>

<!-- end user page-->

<!-- footer -->
<footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <<p>Сайт подготовлен в качестве дипломной работы ФГБОУ ВО "ВГУИТ"</p>
          <p> &copy; <?php echo date('Y'); ?> В. Иванов</p>
        </div>
      </div>
    </div>
</footer>
<!-- end footer -->
</body>
</html>
