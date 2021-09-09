<?php 
	if (!isset($_POST["jml_semester"])) {
		header('Location: index.php');
	}
	require 'variable.php';
?>
<?php
	$baris = $_POST["jml_semester"];
	$totalipk  = 0;
	$nomor = 0;
	$totalmutu = 0;
	$totalsks = 0;

	// $output = number_format($totalipk, 2, '.', '');
	// algoritm
	for ($i=0; $i < $baris; $i++) { 
		$ipsemester[$i] = ($_POST["mutu"][$i]/$_POST["sks"][$i]);
		$totalmutu += $_POST["mutu"][$i];
		$totalsks += $_POST["sks"][$i];
		$totalipk = $totalmutu/$totalsks;
		
	}
 ?>
<!DOCTYPE html>
<html>
<head>
<?= $header; ?>
</head>
<body>
	<div class="header"><a href="index.php" style=" color: white; text-decoration: none;"><?= $judul; ?></a></div>
	<div class="clear"></div>
	<div class="navbar">
	<form action="index.php" method="post" id="jml_semester">
		<label for="j_semester" class="label">Jumlah Semester: </label>
		<input min="1" max="100" value="<?= $baris; ?>" type="number" id="j_semester" name="j_semester" required="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
		<button type="submit" id="submit" name="submit">Submit</button>
		<a href="index.php" class="btn-reset">Reset</a>
	</form>
	<div class="clear"></div>
	</div>

	<div class="container2">
	<table>
		<tr class="title centers">
			<td rowspan="1">Semester Ke-</td>
			<!-- <td rowspan="1">Semester ke-</td> -->
			<td rowspan="1">Nilai Mutu</td>
			<td colspan="1">SKS</td>
			<td colspan="1">IP per Semester</td>
		</tr>
		<!-- <tr class="title centers">
			<td>1 Hari</td>
			<td><?= $_POST["pemakaian"]; ?> Hari</td>
			<td>1 Hari</td>
			<td><?= $_POST["pemakaian"]; ?> Hari</td>
		</tr> -->
	<?php for ($i=0; $i < $baris; $i++) : $nomor++;?>
			<?php if ($nomor%2 == 0) :?>
			<tr id="genap">
			<?php else: ?>
			<tr id="ganjil">
			<?php endif ?>
			<td class="centers"><?= $nomor; ?></td>
			<!-- <td class="centers"><?= $_POST["nama"][$i]; ?></td> -->
			<td class="centers"><?= $_POST["mutu"][$i]; ?></td>
			<td class="centers"><?= $_POST["sks"][$i]; ?> sks</td>
			<!-- <td class="centers"><?= $totalJam[$i]; ?></td> -->

			<!-- <td class="centers"><?= $tarifPerHari[$i]; ?></td> -->
			<td class="centers"><?= number_format((float)$ipsemester[$i], 2, '.', ''); ?></td>
		</tr>
	<?php endfor ?>
	<tr class="title">
		<td colspan="7">
			Total IPK <?= number_format((float)$totalipk, 2, '.', ''); ?><br>
			<!-- Total IPK <?= $_POST["pemakaian"]; ?> Hari Rp. <?= $totalipk; ?>	 -->
			</td>
	</tr>
	</table>
	</div>
	<div class="clear"></div>

<?= $copyright; ?>
</body>
</html>
