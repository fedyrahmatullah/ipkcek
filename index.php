<?php
function validasiAngka(){
	$input = $_POST["j_semester"];
	$var = "/^[0-9]*$/";
	if (!preg_match($var, $input)) {
		echo "
		<script>
			alert('Data tidak sesuai ketentuan, Hanya menerima inputan angka');
			document.location.href='index.php';
		</script>
		";
	}elseif ($_POST["j_semester"] > 100 || $_POST["j_semester"] < 1 ) {
		echo "
		<script>
			alert('Data melebihi kapasitas maksimal, Hanya menerima inputan 1 - 100');
			document.location.href='index.php';
		</script>
		";		
	}
}
require 'variable.php';
?>
<!DOCTYPE html>
<html>
<head>
<?= $header; ?>
</head>
<body>
	<div class="clear"></div>
	<div class="header"><a href="index.php" style="text-decoration: none; color: white;"><?= $judul; ?></a></div>
	<div class="clear"></div>
	<div class="navbar">
	<form action="" method="post" id="jml_semester">
		<label for="j_semester" class="label">Jumlah Semester: </label>
		<?php if (isset($_POST["submit"])) : ?>
		<?php $btnReset = true; ?>
		<input min="1" max="100" value="<?= $_POST["j_semester"]; ?>" type="number" id="j_semester" name="j_semester" required="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
		<?php else : ?>
		<input min="1" max="100" placeholder="Masukan angka saja" type="number" id="j_semester" name="j_semester" required="" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
		<?php endif ?>
		<button type="submit" id="submit" name="submit">Submit</button>
		<?php if ($btnReset) {
			echo "<a href=\"index.php\" class=\"btn-reset\">Reset</a>";
		} ?>
	</form>
	<div class="clear"></div>
	</div>
	<?php if (isset($_POST["submit"])) : ?>
		<?php validasiAngka(); ?>
		<div class="container">
		<form action="hasil.php" method="post">
			<?php for ($i=1; $i<= $_POST["j_semester"]; $i++) :?>
				<div class="inputan">
					<h1>Semester <?= $i; ?></h1>
					<!-- <div class="form-group">
						<label for="nama<?= $i; ?>">Semester Ke-: </label><br>
						<input type="text" id="nama<?= $i; ?>" name="nama[]" required="" placeholder="Semester ke-">
					</div> -->
					<div class="form-group">
						<label for="sks<?= $i; ?>">Jumlah SKS: </label><br>
						<input min="1" type="number" id="sks<?= $i; ?>" name="sks[]" required="" placeholder="Jumlah SKS Semester ini">
					</div>
					<div class="form-group">
						<label for="mutu<?= $i; ?>">Nilai Mutu per Semester: </label><br>
						<input min="1" type="number_float" id="mutu<?= $i; ?>" name="mutu[]" required="" placeholder="Jumlah Nilai Mutu Semester ini">
					</div>
				</div>
			<?php endfor ?>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	<div class="foother">
		
			<input type="text" id="jml_semester" name="jml_semester" value="<?= $_POST["j_semester"]; ?>" hidden="hidden">
			<button type="submit" id="enter" name="enter">Submit</button>
		</form>
		<div class="clear"></div>
	</div>
	<?php endif ?>
		<div class="clear"></div>

<?= $copyright; ?>
</body>
</html>
