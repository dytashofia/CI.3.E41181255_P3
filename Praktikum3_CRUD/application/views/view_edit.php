<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>
<body>
	<center>
		<h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1>
		<h3>Edit Data</h3>
	</center>
	<?php foreach($user as $u){ ?>
	<form action="<?php echo base_url(). 'crud/update'; ?>" method="post">
		<table style="margin:20px auto;">
		<!-- Struktur tabel -->
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $u->id ?>"> <!-- input id, hidden sehingga tidak ditampakkan -->
					<input type="text" name="nama" value="<?php echo $u->nama ?>"> <!-- input nama -->
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $u->alamat ?>"></td> <!-- input alamat -->
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td><input type="text" name="pekerjaan" value="<?php echo $u->pekerjaan ?>"></td> <!-- input pekerjaan -->
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td> <!-- simpan, dengan menggunakan type submit -->
			</tr>
		</table>
	</form>	
	<?php } ?>
</body>
</html>