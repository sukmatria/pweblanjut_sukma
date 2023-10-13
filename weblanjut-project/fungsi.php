<?php
//membuat koneksi ke database mysql
$koneksi=mysqli_connect('localhost','root','','pwlgenap2019-akademik');

function enkripsiurl($id){
    $enc = base64_encode(rand() * strtotime(date("Y-m-d H:I:s"))."-".$id);
    return $enc;
}

function dekipurl($string){
    $kode = base64_decode($string);
    $id = explode("-", $kode);
    if(count($id) > 1) {
        return $id[1];
    }
    else {
        return 0;
    }
}
?>