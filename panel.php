<body align="center">
<form name = "form1" action = "panel.php" method="POST">
<table border="1" align="center"><tr>
<td>Öğrenci no</td><td> :</td><td><input type="text" name="ogrno" value=""></td></tr>
<tr><td>Ara sınav</td><td> :</td><td><input type="text" name="viz" value=""></td></tr>
<tr><td>Final</td><td> :</td><td><input type="text" name="fin" value=""></td></tr>
<tr><td></td><td></td><td><input type="submit" name="kaydet" value="kaydet"></td>
</tr></table>
</form>

<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
  echo "<table border=1 align=center><tr><td><center>Ogretmen sayfasina hosgeldiniz..!</td> ";
  echo "<td><a href=pdegis.php>Parolaya değiştir</a></td>";
  echo "<td><a href=logout.php>Guvenli cikis</a></center></td></tr></table>";
if ((isset($_POST['viz'])&&isset($_POST['fin']))&&isset($_POST['ogrno'])) {
  $ogrno = $_POST['ogrno'];
  $vize = $_POST['viz'] ;
  $final = $_POST['fin'] ;
  $sonuc = $vize*0.4+$final*0.6;
  $baglanti = mysqli_connect('localhost','kullanici_adi','parola','ogrenci');
  $ekle = mysqli_query($baglanti, "insert into ogrnot values ($ogrno,$vize,$final,$sonuc)" );
  $liste = mysqli_query($baglanti,"select * from ogrnot");
  echo "<table align=center border='1px'>";
  echo "<th> Ogrenci no</th><th>vize</th><th>final</th><th>sonuc</th>";
  while ($satir =mysqli_fetch_row($liste)) {
    echo "<tr><td>".$satir[0]."</td><td>".$satir[1]."</td><td>".$satir[2]."</td><td>".$satir[3]."</td></tr>";
    # code...
  }
  echo "</table>";
  mysqli_free_result($liste);
  mysqli_close($baglanti);
  # code...
}
}
?>
 </body>

