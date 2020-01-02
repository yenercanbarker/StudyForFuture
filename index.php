<?php
session_start();
ob_start();

if(isset($_SESSION['ogrenci'])){
  header("Location: ogrenci/");
  die();
}elseif(isset($_SESSION['ogretmen'])){
  header("Location: ogretmen/");
  die();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Title</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>

  <nav id="navigationBar" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand ml-md-5 mr-md-5" href="index.php">
      Study for Future
    </a>
    <button class="navbar-toggler ml-md-5 mr-md-5" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ml-md-5 mr-md-5" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="kayit_ol.php">Kayıt Ol</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="giris_yap.php">Giriş Yap</a>
        </li>
      </ul>
    </div>
  </nav>


  <!-- Main Div -->
  <div class="masthead">
    <div class="container-fluid">
      <div class="row">
        <div id="welcomeDiv" class="container-fluid col-12 col-sm-10 col-md-8 col-lg-6 ml-auto mr-auto text-center">
          <h1 id="welcomeHeader" class="font-weight-bolder mb-4">
            Study for Future'a <br> Hoşgeldiniz!
          </h1>
          <span id="welcomeText" class="">
            Yüzlerce öğretmen tarafından, onlarca farklı ders için hazırlanan
            <br />
            binlerce birbirinden farklı soru çeşitleriyle kendinizi sınavlara
            <br />
            ÜCRETSİZ bir şekilde online olarak hazırlayın.
          </span>
          <br /><br />
          <a href="kayit_ol.php">
            <button type="button" class="welcomeButton btn btn-secondary">
              Şimdi Başla
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>