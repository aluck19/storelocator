<?php
require_once 'supports/initialize.php';
?>
<?php
	$query  = "SELECT * FROM brand ";
	$result = mysqli_query($conn, $query);

	$index = 1;
	$brandCount = 0;

	while ($data = mysqli_fetch_assoc($result)) {
		$brandName[$index] = ucwords($data["name"]);
		$index++;
		$brandCount++;
	}
?>


<?php
require_once 'layouts/header_footer/header.php';
?>
<body style="
    border-top: 3px solid #323a45;
    padding: 20px;
">


<div class="container">



    <div class="row">
        <div class="col-sm-4" >
           <a href="http://localhost/storelocator/index.php"> <h2 style="
    background: #2980b9;
    color: #fff;
    display: inline-block;
    padding: 10px 20px;
    text-transform: uppercase;
    font-size: 18px;
    margin-bottom: 6px;
    word-spacing: 6px;
    letter-spacing: 2px;
">Store Mapper</h2></a>
            <br/>
            <span style="
    text-transform: uppercase;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 5px;
    word-spacing: 5px;
    color: #aba9a9;
    width: 100%;
    margin-left: 8%;
">By TechLekh</span>
        </div>

        <div class="col-sm-8">
            <h4>
                <i class="filter icon large"></i>
                Filter
            </h4>

            <div class="ui form" >
                <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="three fields">
                        <div class="field">
                            <label>Item</label>
                            <select name="itemName" class="form-control">
                                <option> Laptop </option>
                                <option> Smartphone </option>
                            </select>
                        </div>
                        <div class="field">
                            <label>Brand</label>
                            <select name="brandName" class="form-control">
                                <?php
                                for ($index = 1; $index <= $brandCount; $index++) {

                                    foreach ($brandName as $index => $bName) {?>
                                        <option> <?php echo ucfirst($bName); ?> </option>
                                    <?php }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="field">
                            <label>District</label>
                            <select name="district" class="form-control">
                                <?php
                                for ($index = 0; $index != 75; $index++) {
                                    foreach ($districts as $index => $dist) {?>
                                        <option> <?php echo $dist; ?> </option>
                                    <?php }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button name="submit"  class="fluid ui linkedin button">
                        <i class="icon search"></i>
                         Search
                    </button>
                </form>
            </div>
        </div>
    </div>

    <hr/>
	<div class="row">
        <?php
        if (isset($_POST["submit"])) {
        $brandName = $_POST['brandName'];
        $district =$_POST['district'];

        $query  = "SELECT * FROM brand ";
        $query .= "WHERE name =  '{$brandName}' ";
        $result = mysqli_query($conn, $query);

        $data = mysqli_fetch_assoc($result);
        $id = $data['id'];

        $query  = "SELECT * FROM store ";
        $query .= "WHERE brand_id = '{$id}' ";
        $query .= "AND district = '{$district}' ";
        $result = mysqli_query($conn, $query);

        $index = 0;
        $storeCount = 0;

        while ($data = mysqli_fetch_assoc($result)) {
            $name[$index] = $data["name"];
            $adrs[$index] = $data["address"];
            $lndline[$index] = $data["landline"];
            $mobile[$index] = $data["mobile"];
            $index++;
            $storeCount++;
        }
        ?>



        <div class="col-sm-4" style="    height: 80vh;
    overflow-y: scroll;
    overflow-x: hidden;">

            <h4 style="
    display: inline-block;
    float: left;
"><i class="shop icon large" ></i>Stores</h4>
	         <div class="ui breadcrumb" style="
    font-size: 12px;
    display: inline-block;
    background: #fff;
    margin-left: 10px;
    position: relative;
    top: -9px;
    padding: 1px;
">
                <div class="active section">
                    <?php echo $_POST["itemName"];?>
                </div>
                <i class="right chevron icon divider"></i>
                <div class="active section">
                    <?php echo $_POST["brandName"]; ?>
                </div>
                <i class="right chevron icon divider"></i>
                <div class="active section">
                    <?php   echo $_POST["district"]; ?>
                </div>
            </div>

            <hr style="padding:0;margin:0" />



            <div class="ui large feed">

                <?php 	$index = 0;
                while ($index != $storeCount) { ?>

                <div class="event" style="border-bottom: 1px solid #ddd; padding: 10px;">
                    <div class="content">
                        <div class="summary">
                            <a><?php echo $name[$index]; ?></a>
                        </div>
                        <div class="extra ">
                            <?php echo $adrs[$index]; ?>
                        </div>
                        <div class="meta" style="font-style: italic;">
                            <?php echo $lndline[$index]; ?>
                            <br/>
                            <?php echo $mobile[$index]; ?>
                        </div>
                    </div>
                </div>
                    <?php
                    $index++;
                } ?>



            </div>
            <?php } ?>
		</div>

		<div class="col-sm-8">
			<h4><i class="map icon large"></i>Map</h4>
			<hr>

			<div id="map"></div>
			<script>
//				var pos = 0;
				function initMap() {
					<?php $default_lat = "27.7122249";
						  $default_long = "85.34251160000001";
					?>

					var map = new google.maps.Map(document.getElementById('map'), {
						center: {lat: <?php if (isset($_POST['submit'])) {
											$currentDistrict = $_POST['district'];
											echo $districts_latlng[$currentDistrict]['lat'];
										} else {
											echo $default_lat;
									 	} ?>
								, lng: <?php if (isset($_POST['submit'])) {
											echo $districts_latlng[$currentDistrict]['long']; ?> },
						zoom: 13
								<?php 	} else {
											echo $default_long; ?> },
						zoom: 6
								<?php	} ?>
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
	['Ocean Computer Pvt. Ltd.', 27.7122, 85.3425, 1]
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

    <footer>

    <hr>
       <p style="text-align: center; font"> Made with ... by Sushil and Abhishek.</p>
    </footer>


</div>


<?php
require_once 'layouts/header_footer/footer.php';
?>
