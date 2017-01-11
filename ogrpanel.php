<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
$ogrenci=$_SESSION["user"];
echo "<table border=1 align=center><tr><td><center>Ogrenci sayfasina hosgeldiniz..!</td> ";
echo "<td><a href=pdegis.php>Parolaya değiştir</a></td>";
echo "<td><a href=logout.php>Guvenli cikis</a></center></td></tr></table>";

$baglanti = mysqli_connect('localhost','kullanici_adi','parola','ogrenci');

$liste = mysqli_query($baglanti,"select * from ogrnot where ogrenci=$ogrenci");
echo "<table align=center border='1px'>";
echo "<th> Ogrenci no</th><th>vize</th><th>final</th><th>sonuc</th>";
while ($satir =mysqli_fetch_row($liste)) {
  echo "<tr><td>".$satir[0]."</td><td>".$satir[1]."</td><td>".$satir[2]."</td><td>".$satir[3]."</td></tr>";
  # code...
}
echo "</table>";
}
 ?>
