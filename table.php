<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tabel</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" href="custom.css">
</head>
<body>
	<?php if (isset($_POST["submit"])): ?>
		<?php 
			$row = $_POST["row"];
			$columns = $_POST["columns"];
		?>
		<section>
			<div class="container">
				<form action="least-cost.php" method="post">
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
											<td><input name="bobot[<?php echo $i ?>][<?php echo $j ?>]" type="text" placeholder="input bobot"></td>
											<?php if ($j == $columns): ?>
												<td><input name="supp[<?php echo $i ?>]" type="text" placeholder="input supply"></td>
											<?php endif ?>
										<?php endfor ?>
									</tr>
								<?php endfor ?>
								<tr>
									<th>Demand</th>
									<?php for($k=1; $k<=$columns; $k++): ?>
										<td><input type="text" min="0" placeholder="input demmand" name="demm[<?php echo $k ?>]"></td>
									<?php endfor ?>
								</tr>
						</tbody>
					</table>
					<input type="hidden" name="columns" value="<?php echo $columns ?> ">
					<input type="hidden" name="row" value="<?php echo $row ?> ">
					<center>
						<button class="btn btn-danger" name="hitung" type="submit">Hitung</button>
					</center>
				</form>
			</div>
			</section>
	<?php endif ?>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="popper.js"></script>
<script type="text/javascript" src="bootstrap.min.js" ></script>
</body>
</html>