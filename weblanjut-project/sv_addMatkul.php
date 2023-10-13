
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa

$idmatkul = $_POST["idmatkul1"]. "." .$_POST["idmatkul"];
$namamatkul=$_POST["namamatkul"];
$sks=$_POST["sks"];
$jns=$_POST["jns"];
$smt=$_POST["smt"];

$q = "SELECT * FROM matkul WHERE idmatkul = '".$idmatkul."'";

$rs = mysqli_query($koneksi, $q);
if(mysqli_num_rows($rs) == 0) {
    //jika idmatkul tidak ditemukan
    $sql = "INSERT INTO matkul VALUES ('$idmatkul','$namamatkul','$sks','$jns','$smt')";
    mysqli_query($koneksi, $sql);
    header("location: updateMatkul.php");
}
else{
    //jika idmatkul sudah ada, tampilkan peringatan
    echo "<script>
        alert('Id Matkul yang diinput sudah ada')
        javascript:history.go(-1)
    </script>";
}
?>