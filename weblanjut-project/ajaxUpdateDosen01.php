<?php
//memanggil file berisi fungsi2 yang sering dipakai
require "fungsi.php";

/*--------- konfigurasi cetak per halaman ------------*/
//tentukan jumlah data per halaman
$jmlDataPerHal = 3;

//cari jumlah seluruh data yang tampil
if (isset($_POST['cari'])){
	$cari=$_POST['cari'];
	$sql="select * from dosen where npp like'%$cari%' or
						  nama like '%$cari%' or
						  homebase like '%$cari%'";
}else{
	$sql="select * from dosen";		
}
$qry = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
$jmlData = mysqli_num_rows($qry);

//cari jumlah halaman
$jmlHal = ceil($jmlData / $jmlDataPerHal);

//jika halaman daftar mhs dibuka pertamakali, tampilkan data halaman 1 
	if ($_GET['hal']<>0){
		$halAktif=$_GET['hal'];
	}else{
		$halAktif=1;
	}

//tentukan data awal setiap halaman
$awalData=($jmlDataPerHal * $halAktif)-$jmlDataPerHal;
/*--------- /konfigurasi cetak per halaman ------------*/

//cari apakah data berdasar hasil pencarian atau tidak
if (isset($_POST['cari'])){
	$cari=$_POST['cari'];
	$sql="select * from mhs where npp like'%$cari%' or
						  nama like '%$cari%' or
						  homebase like '%$cari%'
						  limit $awalData,$jmlDataPerHal";
}else{
	$sql="select * from dosen limit $awalData,$jmlDataPerHal";		
}

//Ambil data dari database untuk ditampilkan
$hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
?>


<h2 class="text-center">Daftar Dosen</h2>
<span class="float-left">
	<a class="btn btn-success" href="addDosen.php">Tambah Data</a>
</span>
<span class="float-right">
	<form action="" method="post" class="form-inline">
		<button class="btn btn-success" type="submit">Cari</button>
		<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data mahasiswa..." autofocus autocomplete="off">
	</form>
</span>
<br><br>

<!---------------navigasi pagination-------------->
	<ul class="pagination">
	<?php
	//cetak navigasi back
	if ($halAktif>1){
		$back=$halAktif-1;
		echo "<li class='page-item'><a class='page-link' onclick='cetak($back)'>&laquo;</a></li>";
	}
	//cetak angka halaman
	for($i=1;$i<=$jmlHal;$i++){
		if ($i==$halAktif){
			echo "<li class='page-item'><a class='page-link' onclick='cetak($i)' style='font-weight:bold;color:red;'>$i</a></li>";
		}else{
			echo "<li class='page-item'><a class='page-link' onclick='cetak($i)'>$i</a></li>";
		}	
	}
	//cetak navigasi forward
	if ($halAktif<$jmlHal){
		$forward=$halAktif+1;
		echo "<li class='page-item'><a class='page-link' onclick='cetak($forward)'>&raquo;</a></li>";
	}
	?>
</ul>

<!-- Cetak data dengan tampilan tabel -->
<table class="table table-hover">
<thead class="thead-light">
<tr>
	<th>No.</th>
	<th>NPP</th>
	<th>Nama</th>
	<th>Homebase</th>
	<th>Aksi</th>
</tr>
</thead>
<tbody>

<?php	
//jika data tidak ada tampilkan pesan, jika tidak cetak data
if (!$jmlData){
	?>
	<tr><th colspan="6">
		<div class="alert alert-info alert-dismissible fade show text-center">
		<!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
		Data tidak ada
		</div>
	</th></tr>
	<?php
}else{
	//buat penomoran data
	if($awalData==0){
		$no=$awalData+1;
	}else{
		$no=$awalData;
	}
}

while($row=mysqli_fetch_assoc($hasil)){
	?>	
	<tr>
		<td><?php echo $no?></td>
		<td><?php echo $row["npp"]?></td>
		<td><?php echo $row["nama"]?></td>
		<td><?php echo $row["homebase"]?></td>
		<td><img src="<?php echo "foto/".$row["foto"]?>" height="50"></td>
		<td>
		<a class="btn btn-outline-primary btn-sm" href="editDosen.php?kode=<?php echo $row['npp']?>">Edit</a>
		<a class="btn btn-outline-danger btn-sm" href="hpsDosen.php?kode=<?php echo $row["npp"]?>"onclick="return confirm('Yakin dihapus nih?')">Hapus</a></td>
	</tr>
	<?php 
	$no++;
}
?>
</tbody>
</table>
	