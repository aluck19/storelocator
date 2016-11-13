<?php
require_once 'supports/initialize.php';
?>
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
	<link type="Text/CSS" rel="stylesheet" href="layouts/css/style.css"/>
<!--	<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>-->

</head>

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
								<option> <?php echo ucfirst($bName); ?> </option>
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

			<div id="map"></div>
			<script>
//				var pos = 0;
				function initMap() {


					var map = new google.maps.Map(document.getElementById('map'), {
						center: {lat: 27.7122249, lng: 85.34251160000001},
						zoom: 6
					});
//					var infoWindow = new google.maps.InfoWindow({map: map});
					var pos;
					// Try HTML5 geolocation.
					if (navigator.geolocation) {
						navigator.geolocation.getCurrentPosition(function(position) {
							   pos = {
								lat: position.coords.latitude,
								lng: position.coords.longitude
							};

							console.log(pos);

//							infoWindow.setPosition(pos);
//							infoWindow.setContent('You are here!');
//							map.setCenter(pos);

//							var myLatLng = {lat: pos.lat, lng: pos.lng};
//
//
//							var marker = new google.maps.Marker({
//								position: pos,
//								map: map,
//								title: 'You are here!'
//							});
						}, function() {
							handleLocationError(true, infoWindow, map.getCenter());
						});
					} else {
						// Browser doesn't support Geolocation
						handleLocationError(false, infoWindow, map.getCenter());
					}


//					console.log(pos);

					setMarkers(map);

				}

// Data for the markers consisting of a name, a LatLng and a zIndex for the
// order in which these markers should display on top of each other.
//var beaches = [];
var beaches = [
	['Bondi Beach', -33.890542, 151.274856, 4],
	['Coogee Beach', -33.923036, 151.259052, 5],
	['Cronulla Beach', -34.028249, 151.157507, 3],
	['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
	['Maroubra Beach', -33.950198, 151.259302, 1]
];

function setMarkers(map) {
	// Adds markers to the map.

	// Marker sizes are expressed as a Size of X,Y where the origin of the image
	// (0,0) is located in the top left of the image.

	// Origins, anchor positions and coordinates of the marker increase in the X
	// direction to the right and in the Y direction down.
	var image = {
		url: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
		// This marker is 20 pixels wide by 32 pixels high.
		size: new google.maps.Size(20, 32),
		// The origin for this image is (0, 0).
		origin: new google.maps.Point(0, 0),
		// The anchor for this image is the base of the flagpole at (0, 32).
		anchor: new google.maps.Point(0, 32)
	};
	// Shapes define the clickable region of the icon. The type defines an HTML
	// <area> element 'poly' which traces out a polygon as a series of X,Y points.
	// The final coordinate closes the poly by connecting to the first coordinate.
	var shape = {
		coords: [1, 1, 1, 20, 18, 20, 18, 1],
		type: 'poly'
	};
	for (var i = 0; i < beaches.length; i++) {
		var beach = beaches[i];
		var marker = new google.maps.Marker({
			position: {lat: beach[1], lng: beach[2]},
			map: map,
			icon: image,
			shape: shape,
			title: beach[0],
			zIndex: beach[3]
		});
	}
}


				function handleLocationError(browserHasGeolocation, infoWindow, pos) {
					infoWindow.setPosition(pos);
					infoWindow.setContent(browserHasGeolocation ?
						'Error: The Geolocation service failed.' :
						'Error: Your browser doesn\'t support geolocation.');
				}


			</script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDs5Bo9Wh_lnEeEseu-FVoobGcp0Jpzt5Y&callback=initMap"
					async defer></script>

		</div>
	</div>

</div>


</body>
</html>