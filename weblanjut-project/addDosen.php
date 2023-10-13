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
	?>
	<div class="utama">		
		<br><br><br>		
		<h3>TAMBAH DATA DOSEN</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_addDosen.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="npp2">NPP:</label>
    			<input class="form-control" type="text" value="0686.11" name="npp" id="npp" disabled readonly>
				<select name="npp1" id="npp1">
            		<option value="2020">2020</option>
            		<option value="2019">2019</option>
		            <option value="2018">2018</option>
            		<option value="2017">2017</option>
		        </select>
				<input class="form-control" type="text" name="npp" id="npp" required>
			</div>
			<div class="form-group">
				<label for="namadosen">Nama:</label>
				<input class="form-control" type="text" name="namadosen" id="namadosen">
			</div>
			<div class="form-group">
				<label>Homebase:</label><br>
				<select class="form-select form-select-sm" aria-label="Small select example"  name="homebase" id="homebase">
					<option selected>Homebase</option>
            		<option value="A11">A11</option>
            		<option value="A12">A12</option>
		            <option value="A13">A13</option>
            		<option value="A14">A14</option>
				</select>
			</div>
			<div>		
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
</body>
</html>