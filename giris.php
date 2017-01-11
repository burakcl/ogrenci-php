<?php
ob_start();
session_start();
//veritabanı baglantıları ve komutları
$kadi = $_POST['kadi'];
$pass = $_POST['pass'];
$baglanti = mysqli_connect('localhost','kullanici_adi','parola','adm');
$kontrol = mysqli_query($baglanti,"select * from panel where kadi='".$kadi."' and parola='".$pass."'");
$baglanti2 = mysqli_connect('localhost','kullanici_adi','parola','gr_giris');
$kontrol2 = mysqli_query($baglanti2,"select * from kullanici where no='".$kadi."' and pass='".$pass."'");
$snc = mysqli_query($baglanti2,"select yetki from kullanici where no='".$kadi."'");
$yetki = mysqli_fetch_row($snc);
if(mysqli_num_rows($kontrol2)){
  $_SESSION["login"] = "true";
  $_SESSION["user"] = $kadi;
  $_SESSION["pass"] = $pass;
  if($yetki[0] == "1"){//yonlendirme
    header("location:panel.php");
  }else {
    header("location:ogrpanel.php");
  }
}else if(mysqli_num_rows($kontrol)){
  $_SESSION["login"] = "true";
  $_SESSION["user"] = $kadi;
  $_SESSION["pass"] = $pass;
  header("location:admin.php");
}else {//yetkisiz giriş engeli
  if($kadi == "" or $pass == "") {
    echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
  }else {
    echo "<center>Kullanici Adi/Sifre Yanlis.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
}
ob_end_flush();
?>
