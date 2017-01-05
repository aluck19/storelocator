<?php
require_once 'supports/initialize.php';
?>
<?php
	$query  = "SELECT * FROM brand ";
	$brand = mysqli_query($conn, $query);
?>


<?php
require_once 'layouts/header_footer/header.php';
?>
<body id="bodyWrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-4" >
                <a href="http://localhost/storelocator/index.php">
                    <h2 id="store_mapper_logo">
                        Store Mapper
                    </h2>
                </a>
                <br/>
                <span id="by_techlekh">By TechLekh</span>
            </div>
            <!-- end==>col-sm-4 -->

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
                                    if(mysqli_num_rows($brand) >0 ){
                                           while($row= mysqli_fetch_assoc($brand)){
                                                echo '<option>' . ucfirst($row["name"]). '</option>';
                                           }
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
                <!-- end==> ui-form-->
             </div>
            <!-- end==> col-sm-8 -->
        </div>
        <!-- end==> row -->

         <hr/>



	    <div class="row">

            <?php
            if (isset($_POST["submit"])) {
            $brandName = $_POST['brandName'];
            $district = $_POST['district'];

            $query = "SELECT * FROM brand ";
            $query .= "WHERE name =  '{$brandName}' ";
            $result = mysqli_query($conn, $query);

            $data = mysqli_fetch_assoc($result);
            $id = $data['id'];

            $query = "SELECT * FROM store ";
            $query .= "WHERE brand_id = '{$id}' ";
            $query .= "AND district = '{$district}' ";

            $result = mysqli_query($conn, $query);

            if ($result->num_rows > 0) {

            ?>

             <div class="col-sm-4" id="store_left_bar">
                  <h4 class="dp_in_bl fl_lf">
                      <i class="shop icon large"></i>
                      Stores
                  </h4>

                <div class="ui breadcrumb" id="breadcrumb">
                    <div class="active section">
                        <?php echo $_POST["itemName"]; ?>
                    </div>

                    <i class="right chevron icon divider"></i>

                    <div class="active section">
                        <?php echo $_POST["brandName"]; ?>
                    </div>

                    <i class="right chevron icon divider"></i>

                    <div class="active section">
                        <?php echo $_POST["district"]; ?>
                    </div>
                </div>
                 <!-- end==> breadcrumb -->

                <hr class="mg_z pg_z"/>



                <div class="ui large feed">

                    <?php

                         while ($row = $result->fetch_assoc()) {
                        ?>

                    <div class="event event_stl" >
                        <div class="content">
                            <div class="summary">
                                <a>
                                    <?php echo $row["name"]; ?>
                                </a>
                            </div>
                            <div class="extra ">
                                <?php echo $row["address"]; ?>
                            </div>
                            <div class="meta fn_it" >
                                <?php echo $row["landline"]; ?>
                                <br/>
                                <?php echo $row["mobile"]; ?>
                            </div>
                        </div>
                    </div>
                     <!-- end==> event -->
                    <?php
                    } //end of while loop
                    ?>
                </div>
                <?php }
                else {
                  echo "<script> alert('Search not found!'); </script>";

                }

                //create stores json for parsing to java scrip
                $stores = array();
                foreach ($result as $row) {
                    $stores[] = array(
                        $row['name'],
                        (float)$row['lat'],
                        (float)$row['lon']

                    );
                }

                $out = array_values($stores);

                //php version of required json of stores
                $json = json_encode($stores);
                }//
                ?>
              </div>
               <!-- end==> col-sm-4 -->


		    <div    <?php if (isset($_POST["submit"]) && $result->num_rows > 0 ){ echo " class=\"col-sm-8\""; } ?> >
			    <h4>
                    <i class="map icon large"></i>
                    Map
                </h4>
			    <hr>

			    <div id="map">

                </div>
                <!-- end==> map-->

                <script>
                    function initMap() {
                        <?php
                            //default lat long
                            $default_lat = "27.7122249";
                             $default_long = "85.34251160000001";
                        ?>

                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {

                                //get current selected district latlon
                                lat: <?php if (isset($_POST['submit'])) {
                                                $currentDistrict = $_POST['district'];
                                                echo $districts_latlng[$currentDistrict]['lat'];
                                            } else {
                                                echo $default_lat;
                                            } ?>,
                                lng: <?php if (isset($_POST['submit'])) {
                                                echo $districts_latlng[$currentDistrict]['long']; ?> },
                                zoom: 13
                                    <?php 	} else {
                                                echo $default_long; ?> },
                                zoom: 7
                                    <?php	} ?>
                        })



                        var pos;
                        // Try HTML5 geolocation.
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function(position) {
                                   pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude
                                };

                                console.log(pos);

                            }, function() {
                                handleLocationError(true, infoWindow, map.getCenter());
                            });
                        } else {
                            // Browser doesn't support Geolocation
                            handleLocationError(false, infoWindow, map.getCenter());
                        }

                        //call to setMarkers
                        setMarkers(map);

                    } //end==> initMap()


                    // Data for the markers consisting of a name, a LatLng and a zIndex for the
                    // order in which these markers should display on top of each other.
                    var stores = <?php
                        if(!empty($json))
                        print_r($json);
                        else
                        echo " '' ;";

                        ?>

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
                        for (var i = 0; i < stores.length; i++) {
                            var beach = stores[i];
                            console.log(beach);
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

            </div>
            <!-- end==> col-sm-8 -->
	    </div>
        <!-- end==> row -->

        <footer>
        <hr>
           <p class="tx_ct">
               Made with ... by Sushil and Abhishek.
           </p>
        </footer>
    </div>
    <!-- end==> body_wrapper -->
<?php
require_once 'layouts/header_footer/footer.php';
?>
