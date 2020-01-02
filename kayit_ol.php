<?php
require_once('database.php');

if(isset($_POST['ogrenciFormu'])){
  if(isset($_POST['ogrenciAdi'],$_POST['ogrenciSoyadi'],$_POST['ogrenciMail'],$_POST['ogrenciKullaniciAdi'],$_POST['ogrenciSifre'])){
    if(trim($_POST['ogrenciAdi']) !="" &&  trim($_POST['ogrenciSoyadi'])!="" &&  trim($_POST['ogrenciMail'])!=""
      && trim($_POST['ogrenciKullaniciAdi'])!="" && trim($_POST['ogrenciSifre'])!="") {
        $ad = htmlspecialchars(trim($_POST['ogrenciAdi']));
        $soyad = htmlspecialchars(trim($_POST['ogrenciSoyadi']));
        $mail = htmlspecialchars(trim($_POST['ogrenciMail']));
        $kullanici_adi = htmlspecialchars(trim($_POST['ogrenciKullaniciAdi']));
        $sifre = htmlspecialchars(trim($_POST['ogrenciSifre']));
        try{
          $query = $connect->prepare("INSERT INTO $db.tbl_ogrenciler SET
          ad = ?,
          soyad = ?,
          email = ?,
          kullanici_adi = ?,
          sifre = ?");
          $insert = $query->execute(array(
               $ad, $soyad, $mail, $kullanici_adi, $sifre
          ));
        }catch(Exception $e){
         // echo "HATA : ".$e->getMessage();
        }
      }
  }
} else if(isset($_POST['ogretmenFormu'])){
  if(isset($_POST['ogretmenAdi'],$_POST['ogretmenSoyadi'],$_POST['ogretmenMail'],$_POST['ogretmenKullaniciAdi'],$_POST['ogretmenSifre'])){
    if(trim($_POST['ogretmenAdi'])!="" && trim($_POST['ogretmenSoyadi'])!="" && trim($_POST['ogretmenMail'])!=""
      && trim($_POST['ogretmenKullaniciAdi'])!="" && trim($_POST['ogretmenSifre'])!="") {
        $ad = htmlspecialchars(trim($_POST['ogretmenAdi']));
        $soyad = htmlspecialchars(trim($_POST['ogretmenSoyadi']));
        $mail = htmlspecialchars(trim($_POST['ogretmenMail']));
        $kullanici_adi = htmlspecialchars(trim($_POST['ogretmenKullaniciAdi']));
        $sifre = htmlspecialchars(trim($_POST['ogretmenSifre']));
        try{
          $query = $connect->prepare("INSERT INTO $db.tbl_ogretmenler SET
          ad = ?,
          soyad = ?,
          email = ?,
          kullanici_adi = ?,
          sifre = ?");
          $insert = $query->execute(array(
               $ad, $soyad, $mail, $kullanici_adi, $sifre
          ));
        }catch(Exception $e){
         // echo "HATA : ".$e->getMessage();
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
        <div id="welcomeDivSignUp" class="container col-md-8 col-lg-6  ml-auto mr-auto" style="margin-top: 25px;">
          <div id="studentForm">
            <div class="text-center">
              <a href="kayit_ol.php" class="btn p-2 mt-2 mb-4" style="background-color: #cd4236; color: white">
                Geri Dön
              </a>
            </div>
            <form method="POST" class="container col-md-11 form">
              <div class="text-center">
                <p class="userType"><span class="userTypeSpan"> Öğrenci </span> olarak kayıt oluyorsunuz...</p>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Adınız</label>
                <input type="text" class="form-control" name="ogrenciAdi" id="ogrenciAdi" placeholder="Adınızı giriniz">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Soyadınız</label>
                <input type="text" class="form-control" name="ogrenciSoyadi" id="ogrenciSoyadi"
                  placeholder="Soyadınızı giriniz">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Mail Adresiniz</label>
                <input type="email" class="form-control" name="ogrenciMail" id="ogrenciMail"
                  placeholder="Mail adresinizi giriniz">
                <small id="emailHelp" class="form-text text-muted">Mail adresinizi kimseyle paylaşmayacağız.</small>
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
              <input type="hidden" name="ogrenciFormu" value="1">
              <center> <button id="ogretmenFormu" type="submit" class="btn"
                  style="background-color: #1c375b; color: white">Kayıt
                  Ol</button>
              </center>
            </form>
          </div>
          <div id="teacherForm">
            <div class="text-center">
              <a href="kayit_ol.php" class="btn p-2 mt-2 mb-4" style="background-color: #cd4236; color: white">
                Geri Dön
              </a>
            </div>
            <form method="POST" class="container col-md-11 form">
              <div class="text-center">
                <p class="userType"> <span class="userTypeSpan"> Öğretmen</span> olarak kayıt oluyorsunuz...</p>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Adınız</label>
                <input type="text" class="form-control" name="ogretmenAdi" id="ogretmenAdi"
                  placeholder="Adınızı giriniz">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Soyadınız</label>
                <input type="text" class="form-control" name="ogretmenSoyadi" id="ogretmenSoyadi"
                  placeholder="Soyadınızı giriniz">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Mail Adresiniz</label>
                <input type="email" class="form-control" name="ogretmenMail" id="ogretmenMail"
                  placeholder="Mail adresinizi giriniz">
                <small id="emailHelp" class="form-text text-muted">Mail adresinizi kimseyle paylaşmayacağız.</small>
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
              <input type="hidden" name="ogretmenFormu" value="1">
              <center> <button id="ogretmenFormu" type="submit" class="btn"
                  style="background-color: #1c375b; color: white">Kayıt
                  Ol</button>
              </center>
            </form>
          </div>
        </div>

        <div id="welcomeDivSignUpMain" class="container-fluid col-10 text-center">
          <div class="row">
            <div class="col-md-8 col-12 ml-auto mr-auto">
              <div class="text-center container-fluid">
                <div class="pageInformation">
                  KAYIT OL
                </div>
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <a onclick="showStudentSignUpForm()" class="btn userTypeButton stretched-link p-4 mb-4">
                      <img class="img-fluid" src="images/student.png" alt="Student Icon" srcset="" width="150px"
                        height="150px"> <br> <br>
                      <span style="font-size: 28px"> ÖĞRENCİ </span>
                    </a>
                  </div>
                  <div class="col-12 col-sm-6">
                    <a onclick="showTeacherSignUpForm()" class="btn userTypeButton stretched-link p-4 mb-2">
                      <img class="img-fluid" src="images/teacher.png" alt="Teacher Icon" srcset="" width="150px"
                        height="150px"> <br> <br>
                      <span style="font-size: 28px"> ÖĞRETMEN </span>
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