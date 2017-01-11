<?php
ob_start();
session_start();
if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
  $kadi = $_POST["kadi"];
  $baglanti = mysqli_connect('localhost','kullanici_adi','parola','gr_giris');
  $kontrol = mysqli_query($baglanti,"select * from kullanici where no='$kadi'");
  if (mysqli_num_rows($kontrol)) {
    $sil = mysqli_query($baglanti,"delete from kullanici where no='$kadi'");
    mysqli_close($baglanti);
    echo '<script>';
    echo 'alert("Kullanıcı Silindi!");';
    echo 'location.href="admin.php"';
    echo '</script>';
  }else {
  echo '<script>';
  echo 'alert("Kullanıcı bulunamadı!");';
  echo 'location.href="admin.php"';
  echo '</script>';
  }
}
?>
