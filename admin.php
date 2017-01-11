<form action="ogekle.php" method="POST">
<table align="center" border="1px">
<tr>
<td bgcolor="#DFE"><h4> Kayit yap </h4></td>
</tr>
<tr>
<td>Kullanici Adi</td>
<td>:</td>
<td><input type="text" name="kadi"></td>
</tr>
<tr>
<td>Sifre</td>
<td>:</td>
<td><input type="password" name="pass"></td>
</tr>
<tr>
<td>yetki</td>
<td>:</td>
<td><input type="text" name="yetki"></td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" value="kaydet"></td>
</tr>
</table>
</form>

<form action="ogsil.php" method="POST">
<table align="center" border="1px">
<tr>
<td bgcolor="#DFA"><h4> Kullanıcı sil </h4></td>
</tr>
<tr>
<td>Kullanici Adi</td>
<td>:</td>
<td><input type="text" name="kadi"></td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" value="sil"></td>
</tr>
</table>
</form>
<?php
ob_start();
session_start();
if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
    echo "<table border=1 align=center><tr><td><center>Admin sayfasina hosgeldiniz..!</td> ";
    echo "<td><a href=logout.php>Guvenli cikis</a></center></td></tr></table>";
    $baglanti = mysqli_connect('localhost','kullanici_adi','parola','gr_giris');
    $liste = mysqli_query($baglanti,"select * from kullanici");
    echo "<table align="."center"." border='1px'>";
    echo "<th> Kullanıcı Numarası</th><th>Yetki</th>";
    while ($satir =mysqli_fetch_row($liste)) {
      echo "<tr><td>".$satir[0]."</td><td>".$satir[2]."</td></tr>";
    }
    echo "</table>";
    mysqli_free_result($liste);
    mysqli_close($baglanti);
}
?>
