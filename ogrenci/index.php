<?php
session_start();
ob_start();

if(!isset($_SESSION['ogrenci'])){
  header("Location: ../");
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
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>

<body>
  <!-- Image and text -->
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
          <span class="nav-link">Hoşgeldin, <b><i> <?php echo $_SESSION['ogrenci'] ?> </i></b></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cikis_yap.php">Çıkış Yap</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Main Div -->
  <div class="masthead">
    <div class="container-fluid">
      <div class="row">
        <div id="welcomeDiv" class="container-fluid col-6 text-center">
          <div class="row">
            <div class="col-md-6 col-12 ml-auto mr-auto">
              <div class="text-center">
                <a href="test_coz.php" class="btn btn-primary stretched-link p-4">
                  <i class="fas fa-file-alt" style="font-size: 50px"></i> <br>
                  <span style="font-size: 22px"> TEST ÇÖZ </span>
                </a>
              </div>
            </div>
            <div class="col-md-6 col-12 ml-auto mr-auto">
              <div class="text-center">
                <a href="istatistikler.php" class="btn btn-primary stretched-link p-4">
                  <i class="fas fa-chart-bar" style="font-size: 50px"></i> <br>
                  <span style="font-size: 22px"> İSTATİSTİKLER </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/font-awesome.js"></script>
  <script src="../js/script.js"></script>
</body>

</html>