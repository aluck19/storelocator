<?php include"database/DB_CONNECT.php";?>
<?php 
	$query  = "SELECT * FROM brand ";
	$result = mysqli_query($conn, $query);

	$index = 1;
	$brandCount = 0;

	while ($data = mysqli_fetch_assoc($result)) {
		$brandName[$index] = $data["name"];
		$index++;
		$brandCount++;
	}
?>
<html>
<head>
<title> Store Locator </title>
	<link type="Text/CSS" rel="stylesheet" href="layouts/css/bootstrap.min.css"/>
	<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>

</head>
<?php
require_once 'supports/initialize.php';
  ?>
<body>

<div class="container">
	<div class="row">
		<div class="col-sm-4">
		<table class="table table-hover">
			<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<thead>
				<th colspan="2"> Store Locator </th>
				</thead>
				<tbody>
				<tr>
					<td>Item</td>
					<td>
						<select name="itemName" class="form-control">
							<option> Laptop </option>
							<option> Smartphone </option>
						</select>
					</td>
				</tr>


					<td> Brand </td>
					<td>
						<select name="brandName" class="form-control">
						<?php 
							for ($index = 1; $index <= $brandCount; $index++) { 

							foreach ($brandName as $index => $bName) {?>
								<option> <?php echo $bName; ?> </option>
							<?php }
						}
						?>
					</select>
				</td>
				<tr>
					<td> Location </td>
					<td>
						<select name="district" class="form-control">
							<?php
							for ($index = 0; $index != 75; $index++) {
								foreach ($districts as $index => $dist) {?>
									<option> <?php echo $dist; ?> </option>
								<?php }
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right"> <input type="submit" class="btn btn-primary btn-lg" value="Search" name="submit"> </td>
				</tbody>
			</form>
		</table>
		</div>

		<div class="col-sm-8">
			<h3>Map</h3>
			<hr>

		</div>
	</div>

</div>


</body>
</html>