<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Least-Cost</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" href="custom.css">
</head>
<body>

<?php 
if (isset($_POST["hitung"])) {


	$bobot = $_POST["bobot"];
	$supply = $_POST["supp"];
	$demand = $_POST["demm"];
	$row = $_POST["row"];
	$columns = $_POST["columns"];
	$countSupply = 0;
	$countDemand = 0;
	$newSupply = array();
	$oldDemand = array();
	$oldBobot = array();
	$newBobot = array();
	$result = 0;



	for ($i=1; $i <= $row ; $i++) { 
		$countSupply += $supply[$i];
		$newSupply[$i] = $supply[$i];
	}

	for ($i=1; $i <= $columns ; $i++) { 
		$countDemand = $countDemand += $demand[$i];
		$oldDemand[$i] = $demand[$i];
	}

}
?>
<?php if ($countDemand == $countSupply): ?>
<?php 
for ($i=1; $i <= $row; $i++) { 
		for ($j=1; $j <= $columns; $j++) { 
			$newBobot[$i][$j] = 0;
			$oldBobot[$i][$j] = $bobot[$i][$j];
		}   
	}

	while ($countDemand != 0) {
		$min = 999;
		for ($i=1; $i <= $row; $i++) { 
			for ($j=1; $j <= $columns ; $j++) { 
				if (($bobot[$i][$j] < $min) && $demand[$j] != 0) {;
					$min = $bobot[$i][$j];
					$newRow = $i;
					$newColums = $j;
				}
			}
		}
		if ($supply[$newRow] >= $demand[$newColums]) {
			$newBobot[$newRow][$newColums] = $demand[$newColums];
		}
		else{
			$newBobot[$newRow][$newColums] = $supply[$newRow];
		}	
		$demand[$newColums] -= $newBobot[$newRow][$newColums];
		$supply[$newRow] -= $newBobot[$newRow][$newColums];
		$countDemand -= $newBobot[$newRow][$newColums];
		$bobot[$newRow][$newColums] = 1000;
	}

 ?>
 	<center>
 		<h2>TABEL TRANSPORTASI</h2>
 	</center>
	<section>
		<div class="container">
			<table class="table text-area table-bordered">
				<thead class="thead-dark">
					<tr>
						<th></th>
						<?php for($i=1; $i<=$columns; $i++): ?>
							<th>D<?php echo $i ?></th>
						<?php endfor ?>
						<th>Supply</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i=1; $i<=$row; $i++): ?>
						<tr>
							<th>S<?php echo $i ?></th>
							<?php for($j=1; $j<=$columns; $j++): ?>
								<td><?php echo $oldBobot[$i][$j] ?></td>
								<?php if ($j == $columns): ?>
									<td><?php echo $newSupply[$i] ?></td>
								<?php endif ?>
							<?php endfor ?>
						</tr>
					<?php endfor ?>
					<tr>
						<th>Demand</th>
						<?php for($i=1; $i<=$columns; $i++): ?>
							<td><?php echo $oldDemand[$i] ?></td>
						<?php endfor ?>
							<td><?php echo $countSupply?> </td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>
	<center>
		<h2>HASIL</h2>
	</center>
	<section>
		<div class="container">
			<table class="table text-area table-bordered">
				<thead class="thead-dark">
					<tr>
						<th></th>
						<?php for($i=1; $i<=$columns; $i++): ?>
							<th>D<?php echo $i ?></th>
						<?php endfor ?>
						<th>Supply</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i=1; $i<=$row; $i++): ?>
						<tr>
							<th>S<?php echo $i ?></th>
							<?php for($j=1; $j<=$columns; $j++): ?>
								<td> <?php if($newBobot[$i][$j] ==0 ){
									echo("-");
								}else{
									echo $newBobot[$i][$j];
								} ?> <span class="float-right" style="width: 20px; height: 20px; border: 1px solid black; font-size: 10px"> <?php echo $oldBobot[$i][$j] ?></span></td>
								<?php if ($j == $columns): ?>
									<td><?php echo $newSupply[$i] ?></td>
								<?php endif ?>
							<?php endfor ?>
						</tr>
					<?php endfor ?>
					<tr>
						<th>Demand</th>
						<?php for($i=1; $i<=$columns; $i++): ?>
							<td><?php echo $oldDemand[$i] ?></td>
						<?php endfor ?>
							<td><?php echo $countSupply ?> </td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>
	<?php 
	for ($i=1; $i <= $row; $i++) { 
		for ($j=1; $j<=$columns; $j++) { 
			$result += ($oldBobot[$i][$j] * $newBobot[$i][$j]);
		}
	}
	?>
	<center><h3>Hasil : <?php echo $result ?></h3></center>
<?php else: 

	echo "
	<script>
		alert('Tidak Seimbang, PROGRAM HANYA MAMPU MENGHITUNG TRANSPORTASI SEIMBANG');
		document.location.href = 'table.php';
	</script>
	";
	?>

<?php endif ?>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="popper.js"></script>
<script type="text/javascript" src="bootstrap.min.js" ></script>
</body>
</html>

