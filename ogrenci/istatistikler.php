<?php
session_start();
ob_start();
require_once('../database.php');

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
          <div class="text-center">
            <a href="index.php" class="btn p-2 mt-2 mb-4" style="background-color: #cd4236; color: white">
              Geri Dön
            </a>
          </div>

          <?php 
           $query2 = $connect->query("SELECT * FROM $db.tbl_ogrenciler WHERE kullanici_adi = '{$_SESSION['ogrenci']}'")->fetch(PDO::FETCH_ASSOC);
           if($query2){
             $ogrenciId = $query2['id'];
           }

           $query = $connect->query("SELECT * FROM $db.tbl_istatistikler WHERE kullanici_id = '{$ogrenciId}'")->fetchAll(PDO::FETCH_ASSOC);
           if($query):
             foreach($query as $veri):
               $id = $veri['id'];
               $soruSayisi = $veri['soru_sayisi'];
               $yanlisSayisi = $veri['yanlis_sayisi'];
               $limitDogruOrani = $veri['limit_dogru_orani'];
               $turevDogruOrani = $veri['turev_dogru_orani'];
               $integralDogruOrani = $veri['integral_dogru_orani'];
               $fonksiyonlarDogruOrani = $veri['fonksiyonlar_dogru_orani'];
               $carpanlaraayirmaDogruOrani = $veri['carpanlaraayirma_dogru_orani'];
               $rasyonelsayilarDogruOrani = $veri['rasyonelsayilar_dogru_orani'];
               $uslusayilarDogruOrani = $veri['uslusayilar_dogru_orani'];
               $koklusayilarDogruOrani = $veri['koklusayilar_dogru_orani'];
               $testtarihi = $veri['test_tarihi'];
          ?>
          <button type="button" class="btn btn-primary"
            onclick="cubukTabloOlustur('<?php echo $testtarihi;?>',<?=$soruSayisi;?>,<?=$yanlisSayisi;?>,<?=$limitDogruOrani;?>,<?=$turevDogruOrani;?>,<?=$integralDogruOrani;?>
            ,<?=$fonksiyonlarDogruOrani;?>,<?=$carpanlaraayirmaDogruOrani;?>,<?=$rasyonelsayilarDogruOrani;?>,<?=$uslusayilarDogruOrani;?>,<?=$koklusayilarDogruOrani;?>)"><?=$testtarihi;?></button>
          <?php endforeach; endif; ?>
          <br> <br>
          <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        </div>
      </div>
    </div>
  </div>
  <script>
  function cubukTabloOlustur(tarih, soruSayisi, yanlisSayisi, limit, turev, integral, fonksiyon, carpan, rasyonel, uslu,
    koklu) {
    var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      exportEnabled: true,
      theme: "light1", // "light1", "light2", "dark1", "dark2"
      title: {
        text: tarih + " Tarihli Sınav"
      },
      data: [{
        type: "column", //change type to bar, line, area, pie, etc
        //indexLabel: "{y}", //Shows y value on all Data Points
        indexLabelFontColor: "#5A5757",
        indexLabelPlacement: "outside",
        dataPoints: [{
            x: 10,
            y: soruSayisi,
            indexLabel: "Soru"
          },
          {
            x: 20,
            y: yanlisSayisi,
            indexLabel: "Yanlış"
          },
          {
            x: 30,
            y: limit,
            indexLabel: "Limit"
          },
          {
            x: 40,
            y: turev,
            indexLabel: "Türev"
          },
          {
            x: 50,
            y: integral,
            indexLabel: "İntegral"
          },
          {
            x: 60,
            y: fonksiyon,
            indexLabel: "Fonksiyon"
          },
          {
            x: 70,
            y: carpan,
            indexLabel: "Çarpan"
          },
          {
            x: 80,
            y: rasyonel,
            indexLabel: "Rasyonel"
          },
          {
            x: 90,
            y: koklu,
            indexLabel: "Köklü"
          },
          {
            x: 100,
            y: uslu,
            indexLabel: "Üslü"
          }
        ]
      }]
    });
    chart.render();

  }
  </script>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/font-awesome.js"></script>
  <script src="../js/script.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script>

  </script>
</body>

</html>