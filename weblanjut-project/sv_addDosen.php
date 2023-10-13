<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa

$npp = $_POST["$npp1"]. "." .$_POST["$npp2"]. "." .$_POST["$npp"];
$namadosen=$_POST["namadosen"];
$homebase=$_POST["homebase"];

$q = "SELECT * FROM dosen WHERE npp='".$npp."'";

$rs = mysqli_query($koneksi, $q);
if(mysqli_num_rows($rs = 0)) {
    //jika npp tidak ditemukan
    $sql = "INSERT INTO dosen VALUES ('".$npp."','".$namadosen."','".$homebase."')";
    mysqli_query($koneksi, $sql);
    header("location: updateDosen.php");
}
else{
    //jika npp sudah ada, tampilkan peringatan
    echo "<script>
        alert("NPP yang diinput sudah ada")
        javascript:history.go(-1)
    </script>";
}
?>