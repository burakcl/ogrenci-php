<?php
ob_start();
session_start();
if(!isset($_SESSION["login"])){
    header("Location:index.php");
}else {
  $kadi = $_POST["kadi"];
  $pass = $_POST["pass"];
  $yetki = $_POST["yetki"];
  $baglanti = mysqli_connect('localhost','kullanici_adi','parola','gr_giris');
  $kontrol = mysqli_query($baglanti,"select * from kullanici where no='$kadi'");
  if (mysqli_num_rows($kontrol)) {
    echo '<script>';
    echo 'alert("Kulanıcı Mevcut!");';
    echo 'location.href="admin.php"';
    echo '</script>';
  }else {
    $ekle = mysqli_query($baglanti,"insert into kullanici values (".$kadi.",".$pass.",".$yetki.")");
    mysqli_close($baglanti);
    echo '<script>';
    echo 'alert("Kulanıcı Eklendi!");';
    echo 'location.href="admin.php"';
    echo '</script>';
  }
}
?>
