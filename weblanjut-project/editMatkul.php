<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Edit Data Matkul</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>
<body>
	<?php
	require "fungsi.php";
	require "head.html";
	$idmatkul=dekipurl($_GET['kode']);
	$sql="SELECT * FROM matkul WHERE idmatkul='".$idmatkul."'";
	$qry=mysqli_query($koneksi,$sql);
	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center">EDIT DATA MATKUL</h2>	
		<div class="col-sm-9">
			<form enctype="multipart/form-data" method="post" action="sv_editMatkul.php">
				<div class="form-group">
					<label for="idmatkul">ID Matkul:</label>
					<input class="form-control" type="text" name="idmatkul" id="idmatkul" value="<?php echo $row->idmatkul ?>" readonly>
				</div>
				<div class="form-group">
					<label for="namamatkul">Nama:</label>
					<input class="form-control" type="text" name="namamatkul" id="namamatkul" value="<?php echo $row->namamatkul ?>">
				</div>
                <div class="form-group">
                    <label>SKS:</label><br>
                    <select name="sks" id="sks">
                        <option value="2" <?php echo $row->sks == "2"?"selected":""?> > 2 </option>
                        <option value="3" <?php echo $row->sks == "3"?"selected":""?> > 3 </option>
                        <option value="4" <?php echo $row->sks == "4"?"selected":""?> > 4 </option>
                        <option value="5" <?php echo $row->sks == "5"?"selected":""?> > 5 </option>
                    </select>
                </div>			
                <div class="form-group">
                    <label>Jenis:</label><br>
                    <select name="jns" id="jns">
                        <option value="T" <?php echo $row->jns == "T"?"selected":""?>>T</option>
                        <option value="P" <?php echo $row->jns == "P"?"selected":""?>>P</option>
                        <option value="TP" <?php echo $row->jns == "T/P"?"selected":""?>>T/P</option>
                    </select>
                </div>	
                <div class="form-group">
                    <label>Semester:</label><br>
                    <select name="smt" id="smt">
                        <option value="1" <?php echo $row->smt == "1"?"selected":""?>>1</option>
                        <option value="2" <?php echo $row->smt == "2"?"selected":""?>>2</option>
                        <option value="3" <?php echo $row->smt == "3"?"selected":""?>>3</option>
                        <option value="4" <?php echo $row->smt == "4"?"selected":""?>>4</option>
                        <option value="5" <?php echo $row->smt == "5"?"selected":""?>>5</option>
                        <option value="6" <?php echo $row->smt == "6"?"selected":""?>>6</option>
                        <option value="7" <?php echo $row->smt == "7"?"selected":""?>>7</option>
                        <option value="8" <?php echo $row->smt == "8"?"selected":""?>>8</option>
                    </select>
                </div>	
				<div>		
					<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
				</div>
			</form>
		</div>
		</div>
	</div>
	<script>
		$('#submit').on('click',function(){
			var idmatkul 	= $('#idmatkul').val();
			var namamatkul	= $('#namamatkul').val();
			var sks 	    = $('#sks').val();
            var jns         = $('#jns').val();
            var smt         = $('#smt').val();
			$.ajax({
				method	: "POST",
				url		: "sv_editMatkul.php",
				data	: {idmatkul:idmatkul, namamatkul:namamatkul, sks:sks, jns:jns, smt:smt}
			});
		});
	</script>
</body>
</html>