<?php
require_once('../database.php');
session_start();
ob_start();

if(!isset($_SESSION['ogretmen'])){
  header("Location: ../");
  die();
}

if(isset($_POST['soruEklemeFormu']) && $_POST['soruEklemeFormu']){

  if(isset($_POST['soruAciklamasi'])){
    $soruAciklamasi = htmlspecialchars(trim($_POST['soruAciklamasi']));
    echo $soruAciklamasi;
  }

  if(isset($_POST['soruCumlesi'])){
    $soruCumlesi = htmlspecialchars(trim($_POST['soruCumlesi']));
    echo $soruCumlesi;
  }

  if(isset($_POST['soruKonusu']) && trim($_POST['soruKonusu'])!=""){
    $soruKonusu = htmlspecialchars(trim($_POST['soruKonusu']));
    echo $soruKonusu;
  }

  if(isset($_POST['dogruCevap']) && trim($_POST['dogruCevap'])!=""){
    $dogruCevap = htmlspecialchars(trim($_POST['dogruCevap']));
    echo $dogruCevap;
  }

  if(isset($_POST['ikinciSecenek']) && trim($_POST['ikinciSecenek'])!=""){
    $ikinciSecenek = htmlspecialchars(trim($_POST['ikinciSecenek']));
    echo $ikinciSecenek;
  }

  if(isset($_POST['ucuncuSecenek']) && trim($_POST['ucuncuSecenek'])!=""){
    $ucuncuSecenek = htmlspecialchars(trim($_POST['ucuncuSecenek']));
    echo $ucuncuSecenek;
  }

  if(isset($_POST['dorduncuSecenek']) && trim($_POST['dorduncuSecenek'])!=""){
    $dorduncuSecenek = htmlspecialchars(trim($_POST['dorduncuSecenek']));
    echo $dorduncuSecenek;
  }

  if(isset($_POST['besinciSecenek'])){
    $besinciSecenek = htmlspecialchars(trim($_POST['besinciSecenek']));
    echo $besinciSecenek;
  }

  if(isset($_FILES['soruResmi']['name'])){
    $filename = $_FILES['soruResmi']['name'];
    $file_basename = substr($filename, 0, strripos($filename, '.'));
    $file_ext = substr($filename, strripos($filename, '.'));
    $newfilename = $file_basename.$file_ext;
    $filename = $newfilename;
    $location = "../question_images/".$filename;
    $uploadOk = 1;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    
    /* Valid Extensions */
    $valid_extensions = array("jpg","jpeg","png","webp");
    /* Check file extension */
    if( !in_array(strtolower($imageFileType),$valid_extensions) ) 
       $uploadOk = 0;
 
    if($uploadOk == 0)
       echo 0;
    else
    {
       /* Upload file */
       $isuploaded = move_uploaded_file($_FILES['soruResmi']['tmp_name'],$location);
       if($isuploaded)
          echo $_FILES['soruResmi']['name'];

       $soruResmi = $_FILES['soruResmi']['name'];
    }
  }

  try
    {
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = $connect->prepare("INSERT INTO $db.tbl_sorular(aciklama, soru_cumlesi, resim, konu, dogru_cevap, ikinci_secenek, ucuncu_secenek, dorduncu_secenek, besinci_secenek) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $query->bindParam(1, $soruAciklamasi, PDO::PARAM_STR);
      $query->bindParam(2, $soruCumlesi, PDO::PARAM_STR);
      $query->bindParam(3, $soruResmi, PDO::PARAM_STR);
      $query->bindParam(4, $soruKonusu, PDO::PARAM_STR);
      $query->bindParam(5, $dogruCevap, PDO::PARAM_STR);
      $query->bindParam(6, $ikinciSecenek, PDO::PARAM_STR);
      $query->bindParam(7, $ucuncuSecenek, PDO::PARAM_STR);
      $query->bindParam(8, $dorduncuSecenek, PDO::PARAM_STR);
      $query->bindParam(9, $besinciSecenek, PDO::PARAM_STR);
      $query->execute();
    }
    catch(Exception $e)
    {
      echo 'Yakalanan olağandışılık: ',  $e->getMessage(), "\n";
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
          <span class="nav-link">Hoşgeldin, <b><i> <?php echo $_SESSION['ogretmen'] ?> </i></b></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cikis_yap.php">Çıkış Yap</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Main Div -->
  <div class="masthead">
    <div id="mainDiv" class="container-fluid col-12">
      <div class="row">
        <div id="welcomeDiv" class="container col-11 col-md-8 col-lg-6 ml-auto mr-auto">
          <form class="form" action="" method="post" enctype="multipart/form-data">
            <div class="container mb-3">
              <div class="row">
                <div class="form-check form-check-inline">
                  <input id="resimliSoru" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                    value="option1" onclick="showQuestionImageInput()">
                  <label class="form-check-label" for="exampleRadios1">
                    Resimli Soru
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input id="resimsizSoru" class="form-check-input" type="radio" name="exampleRadios" value="option2"
                    checked onclick="hideQuestionImageInput()">
                  <label class="form-check-label" for="exampleRadios2">
                    Resimsiz Soru
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Soru Açıklaması</label>
              <input type="text" class="form-control" id="soruAciklamasi" name="soruAciklamasi"
                placeholder="Sorunun açıklamasını girin">
            </div>

            <div id="soruResmiInput" class="input-group mb-3">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="soruResmi" name="soruResmi" disabled>
                <label class="custom-file-label">Resim
                  Seç</label>
              </div>
            </div>
            <div class="form-group">
              <label>Soru Cümlesi</label>
              <input type="text" class="form-control" id="soruCumlesi" name="soruCumlesi"
                placeholder="Soru cümlesini girin">
            </div>
            <div class="form-group">
              <label>Soru Konusu</label>
              <select class="form-control" id="soruKonusu" name="soruKonusu" placeholder="Sorunun konusunu girin"
                id="exampleFormControlSelect1">
                <option value="limit">Limit</option>
                <option value="turev">Türev</option>
                <option value="integral">İntegral</option>
                <option value="fonksiyonlar">Fonksiyonlar</option>
                <option value="carpanlaraayirma">Çarpanlara Ayırma</option>
                <option value="rasyonelsayilar">Rasyonel Sayılar</option>
                <option value="ondaliklisayilar">Ondalıklı Sayılar</option>
                <option value="uslusayilar">Üslü Sayılar</option>
                <option value="koklusayilar">Köklü Sayılar</option>
              </select>
            </div>
            <div class="form-group">
              <label>Doğru Cevap</label>
              <input type="text" class="form-control" id="dogruCevap" name="dogruCevap"
                placeholder="Doğru cevabı girin">
            </div>
            <div class="form-group">
              <label>2.Şık</label>
              <input type="text" class="form-control" id="ikinciSecenek" name="ikinciSecenek"
                placeholder="2.Şıkkı girin">
            </div>
            <div class="form-group">
              <label>3.Şık</label>
              <input type="text" class="form-control" id="ucuncuSecenek" name="ucuncuSecenek"
                placeholder="3.Şıkkı girin">
            </div>
            <div class="form-group">
              <label>4.Şık</label>
              <input type="text" class="form-control" id="dorduncuSecenek" name="dorduncuSecenek"
                placeholder="4.Şıkkı girin">
            </div>
            <div class="form-group">
              <label>5.Şık</label>
              <input type="text" class="form-control" id="besinciSecenek" name="besinciSecenek"
                placeholder="5.Şıkkı girin">
            </div>
            <button type="submit" class="btn btn-primary" name="soruEklemeFormu" value="1">Ekle</button>
          </form>
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