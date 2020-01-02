<?php
require_once('database.php');
session_start();
ob_start();

if(isset($_POST['ogrenciFormu'])){
  if(isset($_POST['ogrenciKullaniciAdi'],$_POST['ogrenciSifre'])){
    if(trim($_POST['ogrenciKullaniciAdi']) != "" && trim($_POST['ogrenciSifre'])!= "") {
        $ogrenciKullaniciAdi = htmlspecialchars(trim($_POST['ogrenciKullaniciAdi']));
        $ogrenciSifre = htmlspecialchars(trim($_POST['ogrenciSifre']));

        $query = $connect->query("SELECT * FROM $db.tbl_ogrenciler WHERE kullanici_adi = '{$ogrenciKullaniciAdi}' AND sifre= '{$ogrenciSifre}'")->fetch(PDO::FETCH_ASSOC);
        if($query){
          $_SESSION['ogrenci'] = $ogrenciKullaniciAdi;
          header("Location: ogrenci/");
          die();
        }
      }
  }
} else if(isset($_POST['ogretmenFormu'])){
  if(isset($_POST['ogretmenKullaniciAdi'],$_POST['ogretmenSifre'])){
    if(trim($_POST['ogretmenKullaniciAdi']) != "" && trim($_POST['ogretmenSifre'])!= "") {
      $ogretmenKullaniciAdi = htmlspecialchars(trim($_POST['ogretmenKullaniciAdi']));
      $ogretmenSifre = htmlspecialchars(trim($_POST['ogretmenSifre']));
      
      $query = $connect->query("SELECT * FROM $db.tbl_ogretmenler WHERE kullanici_adi = '{$ogretmenKullaniciAdi}' AND sifre= '{$ogretmenSifre}'")->fetch(PDO::FETCH_ASSOC);
      if($query){
        $_SESSION['ogretmen'] = $ogretmenKullaniciAdi;
        header("Location: ogretmen/");
        die();
      }
      }
  }
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

  <div class="masthead">
    <div id="centeredDiv" class="container col-md-12">
      <div class="row">
        <div id="welcomeDivSignIn" class="container col-md-8 col-lg-6  ml-auto mr-auto" style="margin-top: 25px;">
          <div id="studentForm">
            <div class="text-center">
              <a href="giris_yap.php" class="btn p-2 mt-2 mb-4" style="background-color: #cd4236; color: white">
                Geri Dön
              </a>
            </div>
            <form method="POST" class="container col-md-11 form">
              <div class="text-center">
                <p class="userType"><span class="userTypeSpan"> Öğrenci </span> olarak giriş yapıyorsunuz...</p>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Kullanıcı Adınız</label>
                <input type="text" class="form-control" name="ogrenciKullaniciAdi" id="ogrenciKullaniciAdi"
                  placeholder="Kullanıcı adınızı giriniz">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Şifreniz</label>
                <input type="password" class="form-control" name="ogrenciSifre" id="ogrenciSifre"
                  placeholder="Şifrenizi giriniz">
              </div>
              <center> <button name="ogrenciFormu" id="ogrenciFormu" value="1" type="submit" class="btn"
                  style="background-color: #1c375b; color: white">Giriş Yap</button>
              </center>
            </form>
          </div>
          <div id="teacherForm">
            <div class="text-center">
              <a href="giris_yap.php" class="btn p-2 mt-2 mb-4" style="background-color: #cd4236; color: white">
                Geri Dön
              </a>
            </div>
            <form method="POST" class="container col-md-11 form">
              <div class="text-center">
                <p class="userType"><span class="userTypeSpan"> Öğretmen </span> olarak giriş yapıyorsunuz...</p>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Kullanıcı Adınız</label>
                <input type="text" class="form-control" name="ogretmenKullaniciAdi" id="ogretmenKullaniciAdi"
                  placeholder="Kullanıcı adınızı giriniz">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Şifreniz</label>
                <input type="password" class="form-control" name="ogretmenSifre" id="ogretmenSifre"
                  placeholder="Şifrenizi giriniz">
              </div>
              <center> <button name="ogretmenFormu" id="ogretmenFormu" value="1" type="submit" class="btn"
                  style="background-color: #1c375b; color: white"> Giriş Yap</button> </center>
            </form>
          </div>
        </div>
        <div id="welcomeDivSignInMain" class="container-fluid col-10 text-center">
          <div class="row">
            <div class="col-md-8 col-12 ml-auto mr-auto">
              <div class="text-center container-fluid">
                <div class="pageInformation">
                  GİRİŞ YAP
                </div>
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <a onclick="showStudentSignInForm()" class="btn userTypeButton stretched-link p-4 mb-4">
                      <img class="img-fluid" src="images/student.png" alt="Student Icon" srcset="" width="150px"
                        height="150px"> <br> <br>
                      <span style="font-size: 28px"> ÖĞRENCİ </span>
                    </a>
                  </div>
                  <div class="col-12 col-sm-6">
                    <a onclick="showTeacherSignInForm()" class="btn userTypeButton stretched-link p-4 mb-2">
                      <img class="img-fluid" src="images/teacher.png" alt="Teacher Icon" srcset="" width="150px"
                        height="150px"> <br> <br>
                      <span style="font-size: 28px;"> ÖĞRETMEN </span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>