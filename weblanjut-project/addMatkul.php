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
		<h3>TAMBAH DATA MATKUL</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_addMatkul.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="idmatkul2">Id Matkul:</label>
				<select name="idmatkul1" id="idmatkul1">
            		<option value="A11">A11</option>
            		<option value="A12">A12</option>
		            <option value="A13">A13</option>
            		<option value="A14">A14</option>
		        </select>
				<input class="form-control" type="text" name="idmatkul" id="idmatkul" required>
			</div>
			<div class="form-group">
				<label for="namamatkul">Nama Matkul:</label>
				<input class="form-control" type="text" name="namamatkul" id="namamatkul">
			</div>
			<div class="form-group">
				<label for="sks">SKS:</label><br>
				<select class="form-select form-select-sm" aria-label="Small select example"  name="sks" id="sks">
					<option selected>--pilih</option>
            		<option value="2">2</option>
            		<option value="3">3</option>
		            <option value="4">4</option>
            		<option value="5">5</option>
				</select>
			</div>
			<div class="form-group">
				<label for="jns">Jenis:</label><br>
				<select class="form-select form-select-sm" aria-label="Small select example"  name="jns" id="jns">
					<option selected>--pilih--</option>
            		<option value="t">T</option>
            		<option value="p">P</option>
		            <option value="tp">T/P</option>
				</select>
			</div>
			<div class="form-group">
				<label for="smt">Semester:</label><br>
				<select class="form-select form-select-sm" aria-label="Small select example"  name="smt" id="smt">
					<option selected>--pilih--</option>
            		<option value="1">1</option>
            		<option value="2">2</option>
		            <option value="3">3</option>
            		<option value="4">4</option>
            		<option value="5">5</option>
            		<option value="6">6</option>
            		<option value="7">7</option>
            		<option value="8">8</option>
				</select>
			</div>
			<div>		
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
</body>
</html>