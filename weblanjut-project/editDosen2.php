<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Tambah Data Dosen</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>

</head>
<body>
	<?php
	require "head.html";
	require "fungsi.php";
	$npp=dekipurl($_GET['kode']);
	$sql="select * from dosen where npp='$npp'";
	$qry=mysqli_query($koneksi. $sql);
	if(mysqli_query($qry) == 0){
		echo "<script>
		alert ('npp tidak ditemukan')
		javascript:history.go(-1)
		</script>";
		exit();
	}
	$row=mysqli_fetch_object($qry);
	?>
	<div class="utama">		
		<br><br><br>		
		<h3>EDIT DATA DOSEN</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_editDosen.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="npp">NPP:</label>
    			<input class="form-control-ku col-md-3" type="text" value="<? php echo $row->npp ?>" name="npp" id="npp" readonly>
			</div>
			<div class="form-group">
				<label for="namadosen">Nama:</label>
				<input class="form-control" type="text" name="namadosen" id="namadosen" value="<? php echo $row->namadosen ?>">
			</div>
			<div class="form-group">
				<label>Homebase:</label><br>
				<select name="homebase" id="homebase">
            		<option value="A11" <? php echo $row->homebase == "A11"?"selected":""?>>A11</option>
            		<option value="A12" <? php echo $row->homebase == "A12"?"selected":""?>>A12</option>
		            <option value="A13" <? php echo $row->homebase == "A13"?"selected":""?>>A13</option>
            		<option value="A14" <? php echo $row->homebase == "A14"?"selected":""?>>A14</option>
		        </select>
			</div>
			<div>		
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
</body>
</html>