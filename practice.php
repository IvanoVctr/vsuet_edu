<?php
require_once 'Parsedown.php';
// Функция для получения списка файлов в папке lectures
function getLectureFiles($dir = __DIR__ . '\practice')
{
  $files = array_diff(scandir($dir), array('.', '..'));
  return array_values(array_filter($files, function ($file) use ($dir) {
    return is_file("$dir/$file");
  }));
}
// Функция для чтения содержимого выбранной лекции
function getLectureContent($filename)
{
  if (file_exists($filename)) {
    return file_get_contents($filename);
  }
  return "<div class='banner'><h4 id='banner-h'>Выберите практическую работу.</h4></div>";
}
// Получаем список файлов лекций
$lectureFiles = getLectureFiles();
// Получаем содержимое выбранной лекции
$selectedLecture = isset($_GET['lecture']) ? $_GET['lecture'] : "Что то не так(";
$lectureContent = $selectedLecture ? getLectureContent(__DIR__ . "/practice/" . $selectedLecture) : (__DIR__ . "/practice/" . $selectedLecture);
// Получаем заголовки из лекции
$Parsedown = new Parsedown();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <title>Vsuet lectures</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
  <link rel="stylesheet" href="assets/css/lang.css">
  <script src="https://cdn.jsdelivr.net/npm/parsedown@1.7.3/dist/parsedown.min.js"></script>
</head>

<body>
  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="index.php">Вгуит_лекции</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a>Заметки</a></li>
      </ul>
    </nav>
  </header>
  <!--end header-->

  <!-- Lectures-->
  <section class="section-lectures">
    <div id="lecturesContainer">
      <div id="lecturesList" class="sidebar">
        <!-- Перечень лекций из папки /lectures -->
        <ul>
          <?php foreach ($lectureFiles as $file): ?>
            <li><a href="?lecture=<?= urlencode($file) ?>"
                data-lecture="<?= htmlspecialchars($file) ?>"><?= htmlspecialchars($file) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div id="lecturesSelect" class="sidebar">
        <!-- Перечень лекций в виде select для мобильных устройств -->
        <select onchange="loadLecture(this)">
          <option value="">Выберите лекцию</option>
          <?php foreach ($lectureFiles as $file): ?>
            <option value="<?= htmlspecialchars($file) ?>" <?= $selectedLecture === $file ? 'selected' : '' ?>>
              <?= htmlspecialchars($file) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div id="lectureContent" class="content">
        <!-- Отображение выбранной лекции из левого sidebar -->
        <?php echo $Parsedown->text($lectureContent) ?>
      </div>
    </div>
  </section>
  <!-- Lectures end-->

  <hr style="border: 1px solid #9c9c9c; width: 75%; margin-top: 40px;">

  <!-- Notes -->
  <section class="section-notes">
    <div class="notes">
      <h4>Прикрепить отчет:</h4>
      <form action="#" method="post">
        <input type="hidden" name="prictice_id">
        <input class="form-control" type="file" id="formFileMultiple" multiple>
        <input type="submit" value="Прикрепить" class="btn btn btn-success">
      </form>
    </div>
  </section>
  <!-- Notes end -->

  <!-- Footer -->
  <footer class="footer navbar-fixed-bottom row-fluid">
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

  <!-- Script -->
  <script>
    function loadLecture(select) {
      const selectedFile = select.value;
      if (selectedFile) {
        window.location.href = '?lecture=' + encodeURIComponent(selectedFile);
      }
    }
    function syncSelectWithLinks(select) {
      const links = document.querySelectorAll('#lecturesList a');
      links.forEach(link => {
        link.addEventListener('click', function (event) {
          event.preventDefault();
          const lecture = this.getAttribute('data-lecture');
          select.value = lecture;
          window.location.href = '?lecture=' + encodeURIComponent(lecture);
        });
      });
    }
    window.onload = function () {
      const select = document.getElementById('lecturesSelect');
      syncSelectWithLinks(select);
    }
  </script>
  <!-- Script end-->
  
</body>
</html>