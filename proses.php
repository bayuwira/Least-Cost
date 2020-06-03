<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Least-Cost</title>
</head>
<body>
	<table class="table text-area">
		<thead class="thead-dark">
			<tr>
				<th></th>
				<?php for($i=1; $i<=$_POST["col"]; $i++): ?>
					<th>D<?php echo $i ?></th>
				<?php endfor ?>
				<th>Supply</th>
			</tr>
		</thead>
		<tbody>
			<?php if (isset($_POST["submit"])): ?>
				<?php for($i=1; $i<=$_POST["rw"]; $i++): ?>
					<tr>
						<th>S<?php echo $i ?></th>
						<?php for($k=1; $k<=$_POST["col"]; $k++): ?>
							<td><input value="bobot[<?php echo $i ?>][<?php echo $k ?>]" type="text" placeholder="input bobot"></td>
							<?php if ($k == $_POST["col"]): ?>
								<td><input name="supp[<?php echo $i ?>]" type="text" placeholder="input bobot"></td>
							<?php endif ?>
						<?php endfor ?>
					</tr>
				<?php endfor ?>
				<tr>
					<th>Demand</th>
					<?php for($k=1; $k<$_POST["col"]+1; $k++): ?>
						<td><input type="text" min="0" placeholder="input bobot" name="demm[<?php echo $k ?>]"></td>
					<?php endfor ?>
				</tr>
			<?php endif ?>
		</tbody>
	</table>	
</body>
</html>