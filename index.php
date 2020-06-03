<?php 
if (isset($_POST["hitung"])) {
	var_dump($_POST["bobot"]);
	var_dump($_POST["supp"]);
	var_dump($_POST["demm"]);
}

 ?>

 <?php 
 	function old($method, $name){
 		echo isset($method) ? $name : '';
 	}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Least-Cost</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" href="custom.css">
</head>
<body>
	<section>
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">Tugas Riset Operasi</h1>
				<h1 class="display-4">Metode Transportasi Least Cost</h1>
				<p class="lead">By :  Bayu Wira</p>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="content-container">
				<form action="table.php" method="post">
					<div class="form-group">
						<label for="row">Input Jumlah Baris</label>
						<input type="text" min="0" class="form-control" id="row" aria-describedby="" placeholder="" name="row" 
						value="<?php echo isset($_POST["submit"]) ? $_POST["row"] : ''?>" >
					</div>
					<div class="form-group">
						<label for="columns">Input Jumlah Kolom</label>
						<input type="text" min="0" class="form-control" id="columns" placeholder="" name="columns"
						value="<?php echo isset($_POST["submit"]) ? $_POST["columns"] : ''  ?>">
					</div>
					<button  type="submit" class="btn btn-primary btn-block" name="submit">Buat</button>
				</form>
			</div>
		</div>
	</section>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="popper.js"></script>
	<script type="text/javascript" src="bootstrap.min.js" ></script>
</body>
</html>