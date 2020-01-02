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
  <div class="mastheadTestCoz">
    <div class="container-fluid">
      <div class="row">
        <div id="welcomeDiv" class="container-fluid col-6 text-center">
          <div class="row ">
            <div class="container text-center">
              <a href="index.php" class="btn p-2 mt-2 mb-4" style="background-color: #cd4236; color: white">
                Geri Dön
              </a>
            </div>
          </div>
          <div class="row">
            <div class="container text-center">
              <?php
            $soruSayisi = 1;
            $query = $connect->query("SELECT * FROM $db.tbl_sorular ORDER BY id DESC LIMIT 50")->fetchAll(PDO::FETCH_ASSOC);
              foreach($query as $veri)
              {
                if($veri['aciklama'] != "") {
                  $soruAciklamasi = $veri['aciklama'];
                }
                if($veri['soru_cumlesi'] != "") {
                  $soruCumlesi = $veri['soru_cumlesi'];
                }
                if($veri['resim'] != "") {
                  $soruResmi = $veri['resim'];
                }
                $soruId = $veri['id'];
                $soruKonusu = $veri['konu'];
                $dogruCevap = $veri['dogru_cevap'];
                $ikinciSecenek = $veri['ikinci_secenek'];
                $ucuncuSecenek = $veri['ucuncu_secenek'];
                $dorduncuSecenek = $veri['dorduncu_secenek'];
                $besinciSecenek = $veri['besinci_secenek'];
          ?>
              <div id="soruPenceresi<?=$soruSayisi;?>"
                <?php if($soruSayisi==1) echo 'class="simdikiSoru"'; else echo 'class="sonrakiSoru"';?>>
                <h3> Soru <?=$soruSayisi;?> </h3>
                <?php if(isset($soruResmi)): ?>
                <img src="../question_images/<?=$soruResmi;
              ?>" class="img-thumbnail" width="250px" height="200px" alt="Soru Resmi">
                <?php elseif(isset($soruAciklamasi)): ?>
                <h5> <?=$soruAciklamasi;?> </h5>
                <?php endif; ?>
                <?php if(isset($soruCumlesi)): ?>
                <h5 class="text-bolder"><?=$soruCumlesi;?></h5>
                <?php endif; ?>
                <input type="hidden" name="soruKonusu<?=$soruSayisi;?>" id="soruKonusu<?=$soruSayisi;?>"
                  value="<?=$soruKonusu;?>">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ogrenciCevabi" id="ogrenciCevabi" value="dogru">
                  <label class="form-check-label">
                    <?=$dogruCevap;?>
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ogrenciCevabi" id="ogrenciCevabi" value="yanlis">
                  <label class="form-check-label">
                    <?=$ikinciSecenek;?>
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ogrenciCevabi" id="ogrenciCevabi" value="yanlis">
                  <label class="form-check-label">
                    <?=$ucuncuSecenek;?>
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ogrenciCevabi" id="ogrenciCevabi" value="yanlis">
                  <label class="form-check-label">
                    <?=$dorduncuSecenek;?>
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="ogrenciCevabi" id="ogrenciCevabi" value="yanlis">
                  <label class="form-check-label">
                    <?=$besinciSecenek;?>
                  </label>
                </div>
                <button type="button" class="btn btn-primary" onclick="soruyuCevapla()">CEVAPLA</button>
              </div>
              <?php $soruSayisi++; } ?>
              <button id="testiBitirButonu" type="button" class="btn btn-primary" onclick="testiBitir()">TESTİ
                BİTİR</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/font-awesome.js"></script>
  <script src="../js/script.js"></script>
</body>

</html>