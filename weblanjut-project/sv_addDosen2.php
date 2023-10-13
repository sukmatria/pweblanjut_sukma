
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$npp=$_POST["npp"];
$namadosen=$_POST["namadosen"];
$homebase=$_POST["homebase"];


$sql="insert into dosen values('$npp','$namadosen','$homebase')";
mysqli_query($koneksi,$sql);
header("location:addDosen.php");
?>