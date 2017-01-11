<?php
ob_start();
session_start();
if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
//burada kaldık
  $baglanti = mysqli_connect('localhost','kullanici_adi','parola','gr_giris');
  $kadi = $_SESSION["user"];
  $epass = $_POST["epass"];
  $npass = $_POST["npass"];
  $npass2 = $_POST["npass2"];
  $kontrol = mysqli_query($baglanti,"select * form kullanici where pass='$epass'");
if (!(empty($epass) or empty($npass) or empty($npass2))) {
  if (!mysqli_num_rows($kontrol)){
    if($npass == $npass2){
      $guncelle = mysqli_query($baglanti,"update kullanici set pass='$npass' where no='$kadi'");
      echo '<script>';
      echo 'alert(" Parola Başarıyla değiştirildi!");';
      echo 'location.href="logout.php"';
      echo '</script>';
    }else {
      echo '<script>';
      echo 'alert("Yeni Parolalar eşleşmiyor!");';
      echo '</script>';
    }
  }else {
    echo '<script>';
    echo 'alert("Eski Parola Yanlış!");';
    echo '</script>';
  }
}else {
  echo '<script>';
  echo 'alert("Boş Bölüm Bıraktınız!");';
  echo '</script>';
}
}
 ?>
 <form action="pdegis.php" method="POST">
 <table align="center">
 <tr>
 <td>Eski Parola</td>
 <td>:</td>
 <td><input type="text" name="epass"></td>
 </tr>
 <tr>
 <td>Yeni Parola</td>
 <td>:</td>
 <td><input type="password" name="npass"></td>
 </tr>
 <tr>
 <td>Yeni Parola</td>
 <td>:</td>
 <td><input type="password" name="npass2"></td>
 </tr>
 <tr>
 <td></td>
 <td></td>
 <td><input type="submit" value="Degistir"></td>
 </tr>
 </table>
 </form>
