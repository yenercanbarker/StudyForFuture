<?php
session_start();
ob_start();

require_once('../database.php');

if(!isset($_SESSION['ogrenci'])){
  header("Location: ../");
  die();
}

try
{
  $query2 = $connect->query("SELECT * FROM $db.tbl_ogrenciler WHERE kullanici_adi = '{$_SESSION['ogrenci']}'")->fetch(PDO::FETCH_ASSOC);
  if($query2){
    $ogrenciId = $query2['id'];
  }

  $toplamSoruSayisi = 0;
  $toplamYanlisSayisi = 0;
  for($i=0; $i<=8; $i++){
    $toplamSoruSayisi += $_POST['sonuc'][$i][0];
    $toplamYanlisSayisi += $_POST['sonuc'][$i][1];
  }

  if($_POST['sonuc'][0][0] != 0)
    $limitDogruOrani = (1 - round($_POST['sonuc'][0][0] / $_POST['sonuc'][0][1],2)) * 100;
  else
    $limitDogruOrani = 0;
  
  if($_POST['sonuc'][1][0] != 0)
    $turevDogruOrani = (1 - round($_POST['sonuc'][1][1] / $_POST['sonuc'][1][0],2)) * 100;
  else
    $turevDogruOrani = 0;

  if($_POST['sonuc'][2][0] != 0)
    $integralDogruOrani = (1 - round($_POST['sonuc'][2][1] / $_POST['sonuc'][2][0],2)) * 100;
  else
    $integralDogruOrani = 0;

  if($_POST['sonuc'][3][0] != 0)
    $fonksiyonlarDogruOrani = (1 - round($_POST['sonuc'][3][1] / $_POST['sonuc'][3][0],2)) * 100;
  else
    $fonksiyonlarDogruOrani = 0;
  
  if($_POST['sonuc'][4][0] != 0)
    $carpanlaraayirmaDogruOrani = (1 - round($_POST['sonuc'][4][1] / $_POST['sonuc'][4][0],2)) * 100;
  else
    $carpanlaraayirmaDogruOrani = 0;
  
  if($_POST['sonuc'][5][0] != 0)
    $rasyonelsayilarDogruOrani = (1 - round($_POST['sonuc'][5][1] / $_POST['sonuc'][5][0],2)) * 100;
  else
    $rasyonelsayilarDogruOrani = 0;

  if($_POST['sonuc'][6][0] != 0)
    $ondaliklisayilarDogruOrani = (1 - round($_POST['sonuc'][6][1] / $_POST['sonuc'][6][0],2)) * 100;
  else
    $ondaliklisayilarDogruOrani = 0;
 
  if($_POST['sonuc'][7][0] != 0)
    $uslusayilarDogruOrani = (1 - round($_POST['sonuc'][7][1] / $_POST['sonuc'][7][0],2)) * 100;
  else
    $uslusayilarDogruOrani = 0;

  if($_POST['sonuc'][8][0] != 0)
    $koklusayilarDogruOrani = (1 - round($_POST['sonuc'][8][1] / $_POST['sonuc'][8][0],2)) * 100;
  else
    $koklusayilarDogruOrani = 0;

  $bugün = date("Y-m-d");

  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = $connect->prepare("INSERT INTO $db.tbl_istatistikler(kullanici_id, soru_sayisi, yanlis_sayisi, limit_dogru_orani, turev_dogru_orani, integral_dogru_orani, fonksiyonlar_dogru_orani
  , carpanlaraayirma_dogru_orani, rasyonelsayilar_dogru_orani, ondaliklisayilar_dogru_orani, uslusayilar_dogru_orani, koklusayilar_dogru_orani, test_tarihi) 
  VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $query->bindParam(1, $ogrenciId, PDO::PARAM_STR);
  $query->bindParam(2, $toplamSoruSayisi, PDO::PARAM_STR);
  $query->bindParam(3, $toplamYanlisSayisi, PDO::PARAM_STR);
  $query->bindParam(4, $limitDogruOrani, PDO::PARAM_STR);
  $query->bindParam(5, $turevDogruOrani, PDO::PARAM_STR);
  $query->bindParam(6, $integralDogruOrani, PDO::PARAM_STR);
  $query->bindParam(7, $fonksiyonlarDogruOrani, PDO::PARAM_STR);
  $query->bindParam(8, $carpanlaraayirmaDogruOrani, PDO::PARAM_STR);
  $query->bindParam(9, $rasyonelsayilarDogruOrani, PDO::PARAM_STR);
  $query->bindParam(10, $ondaliklisayilarDogruOrani, PDO::PARAM_STR);
  $query->bindParam(11, $uslusayilarDogruOrani, PDO::PARAM_STR);
  $query->bindParam(12, $koklusayilarDogruOrani, PDO::PARAM_STR);
  $query->bindParam(13, $bugün, PDO::PARAM_STR);
  $query->execute();
}
catch(Exception $e)
{
  echo 'Yakalanan olağandışılık: ',  $e->getMessage(), "\n";
}
?>