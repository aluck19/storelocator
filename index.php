<?php
require_once 'supports/initialize.php';
session_start();
?>
<?php
	$query  = "SELECT * FROM brand ";
	$brand = mysqli_query($conn, $query);
?>


<?php
require_once 'layouts/header_footer/header.php';
?>

<script>
    //on page load: to show relative options in filter
    $(window).load(function() {

        var item = document.getElementById("s_itemName");
        var option1 = item.options[item.selectedIndex].value;
        // console.log(option1);
        showBrands(option1);

        var brand = document.getElementById("s_brandName");
        try{
            var option2 = brand.options[brand.selectedIndex].value;
            //console.log(option2);
            showDistricts(option2);
        }catch (err){
            //console.log("Error");
        }
    });
</script>

<body id="body_wrapper">

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

                <div id="menu">
                    <a href="faq.php">FAQ</a>
                    <a href="contact.php">Contact</a>
                </div>

            </div>
            <!-- end==>col-sm-4 -->

            <div class="col-sm-8">
                <h4>
                    <i class="filter icon large"></i>
                    Filter
                </h4>

                <div class="ui form" >
                    <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
                        <div class="three fields">
                            <div class="field">
                                <label>Item</label>
                                <select onchange="showBrands(this.value)" id="s_itemName" name="itemName" class="form-control" required="">
                                    <option> Smartphone </option>
                                    <option> Laptop </option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Brand</label>
                                <select onchange="showDistricts(this.value)" name="brandName" id="s_brandName" class="form-control" required="">
                                </select>
                            </div>
                            <div class="field">
                                <label>District</label>
                                <select name="district" id="s_district" class="form-control" required="">
                                </select>
                            </div>
                        </div>
                        <button type="submit"  id="filter_button" value="submit"  class="fluid ui linkedin button">
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

            if(isset( $_GET['brandName']) && isset( $_GET['district']) && isset( $_GET['itemName'])){
                $_GET["filter"] = "set";
            }

            if (isset($_GET["filter"])) {
            $brandName = mysqli_real_escape_string($conn,$_GET['brandName']);
            $district = mysqli_real_escape_string($conn,$_GET['district']);

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
                    //start a PHP session
                    //this prevents spamming the click count by refreshing the page
                    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    $curPage = mysqli_real_escape_string($conn,htmlspecialchars($actual_link));

                    //echo $curPage;
                    //get current click count for page from database;
                    //output error message on failure
                    if(!$rs = mysqli_query($conn, "SELECT * FROM post_hits WHERE url = '$curPage'")) {
                        echo "Could not parse click counting query.";
                    }
                    //if no record for this page found,
                    elseif(mysqli_num_rows($rs) == 0) {
                        //try to create new record and set count for new page to 1;
                        //output error message if problem encountered
                        $date = date("Y-m-d H-i-s");
                       // echo $date;

                        $itemName = $_GET["itemName"];

                        if(!$rs = mysqli_query($conn, "INSERT INTO post_hits (item_name, brand_name, district_name, url, total_hits, last_hit_date) VALUES ('$itemName','$brandName', '$district', '$curPage', 1, '$date')")) {
                            //echo "INSERT INTO post_hits (item_name, brand_name, district_name, url, total_hits, last_hit_date) VALUES ('$itemName','$brandName', '$district', '$curPage', 1, '$date')";
                            echo "Could not create new click counter for this page.";
                        }
                        else {
                            $clicks = 1;
                        }
                    }
                    else {
                        //get number of clicks for page and add 1
                        $row = mysqli_fetch_assoc($rs);
                        $clicks = $row['total_hits'] + 1;

                        $date = date("Y-m-d H-i-s");
                        //update click count in database;
                        //report error if not updated
                        if (!$rs = mysqli_query($conn, "UPDATE post_hits SET total_hits = $clicks, last_hit_date = '$date'  WHERE url = '$curPage'")) {
                            echo "Could not save new click count for this page.";
                        }
                    }







            ?>

             <div class="col-sm-4" id="store_left_bar">
                  <h4 class="dp_in_bl fl_lf">
                      <i class="shop icon large"></i>
                      Stores
                  </h4>

                <div class="ui breadcrumb" id="breadcrumb">
                    <div  class="active section">
                        <?php echo $_GET["itemName"]; ?>
                    </div>

                    <i class="right chevron icon divider"></i>

                    <div class="active section">
                        <?php echo $_GET["brandName"]; ?>
                    </div>

                    <i class="right chevron icon divider"></i>

                    <div class="active section">
                        <?php echo $_GET["district"]; ?>
                    </div>
                </div>
                 <!-- end==> breadcrumb -->

                <hr class="mg_z pg_z"/>



                <div class="ui large feed">

                    <?php

                         while ($row = $result->fetch_assoc()) {
                        ?>

                    <div class="event event_stl" >
                        <div  class="content bg_al" id="str_desc">
                            <div class="summary">
                                    <?php echo $row["name"]; ?>
                            </div>
                            <div class="extra ">
                                <?php echo $row["address"]; ?>
                            </div>
                            <div class="meta fn_it" >
                                <?php echo $row["landline"]; ?>
                                <br/>
                                <?php echo $row["mobile"]; ?>
                            </div>
                            <br/>
                            <div class="meta">
                                <?php
                                if($row["website"]){
                                    echo "<a  target='_blank' id=\"website\" href=\"#\">". $row["website"] . "</a>";
                                }
                                ?>

                            </div>
                            <br/>
                            <div class="meta">
                                <button type="button" id="report"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-store_id="<?php echo $row['id']; ?>"  data-store_name="<?php echo $row['name']; ?>">Report</button>
                            </div>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel">Report to</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>

                                                <input type="hidden" class="form-control" name="r_store_id" id="r_store_id" required="">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Topic</label>
                                                    <input type="text" class="form-control" id="r_topic" name="r_topic" id="r_topic" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Name</label>
                                                    <input type="text" class="form-control" id="r_name" name="r_name" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Email</label>
                                                    <input type="text" class="form-control" id="r_email" name="r_email" required="" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Message</label>
                                                    <textarea class="form-control" name="r_message" id="r_message" required=""></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="report" id="submit_report" class="btn btn-primary">Report</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end==> modal -->

                        </div>

                        <div class="content" id="str_info">
                            <?php
                            if($row["lat"] && $row["lon"]){

                                echo '<div id=\'mapped\'>
                                        <a  href="javascript:google.maps.event.trigger(gmarkers[\'' .  $row["name"] .'\'],\'click\');" >
                                            <img src=\'layouts/img/map_icon.png\'/>
                                            </a>
                                        </div>';
                            }
                            ?>
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
                ?>

                <?php
                //create stores json for parsing to javascript
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

                echo "</div>";

                }//end of isset submit if


                else {

                ?>
                 <div class="col-sm-4 info_block" style="overflow: auto;" id="store_left_bar">
                     <h4>
                         <i class="info icon large"></i>
                         What is Store Mapper?
                     </h4>
                     <hr class="mg_z pg_z"/>
                    <br/>
                     <p>
                         Loreum Ipsum  Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum
                         Loreum Ipsum  Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum
                         Loreum Ipsum  Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum
                     </p>

                     <p>
                         Loreum Ipsum  Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum
                         Loreum Ipsum  Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum
                         Loreum Ipsum  Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum Loreum Ipsum
                     </p>
                 </div>
                 <?php }?>

               <!-- end==> col-sm-4 -->


		    <div class="col-sm-8" >
			    <h4 class="dp_in_bl">
                    <i class="map icon large"></i>
                    Map
                </h4>

                <hr>

                 <?php if (isset($_GET['filter'])) {?>
                    <div id="floating-panel">
                        <input id="autocomplete"  type="text" class="form-control"  placeholder="Enter text here">
                        <button id="searchButton" type="button">
                            <span class="glyphicon glyphicon-road" aria-hidden="true"></span> Get Direction
                        </button>
                    </div>
                <?php } ?>
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
                                lat: <?php if (isset($_GET['filter'])) {
                                                $currentDistrict = $_GET['district'];
                                                echo $districts_latlng[$currentDistrict]['lat'];
                                            } else {
                                                echo $default_lat;
                                            } ?>,
                                lng: <?php if (isset($_GET['filter'])) {
                                                echo $districts_latlng[$currentDistrict]['long']; ?> },
                                zoom: 12
                                    <?php 	} else {
                                                echo $default_long; ?> },
                                zoom: 7
                                    <?php	} ?>
                        })

                        // Data for the markers consisting of a name, a LatLng and a zIndex for the
                        // order in which these markers should display on top of each other.
                        var locations = <?php
                            if(!empty($json))
                                print_r($json);
                            else
                                echo " '' ;";

                            ?>

                        gmarkers = [];

                        var infowindow = new google.maps.InfoWindow();

                        // create a Marker
                        function createMarker(latlng, html) {
                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });

                            google.maps.event.addListener(marker, 'click', function() {
                                infowindow.setContent(html);
                                infowindow.open(map, marker);

                                var lat = marker.getPosition().lat();
                                var lon = marker.getPosition().lng();

                                //end point for route direction
                                  end = new google.maps.LatLng(lat, lon);



                            });
                            return marker;
                        }

                        //call create market and place the clicked locations on map
                        for (var i = 0; i < locations.length; i++) {
                            gmarkers[locations[i][0]]=
                                createMarker(new google.maps.LatLng(locations[i][1],locations[i][2]), locations[i][0]);
                        }


                          var geocoder;

                          var autocomplete;

                        function initialize() {
                                var options = {
                                    // use types for selecting support type for locations
                                    //types: ['(regions)'] ,
                                    componentRestrictions: {country: "np"}
                                };
                                var input = document.getElementById('autocomplete');
                                autocomplete = new google.maps.places.Autocomplete(input, options);
                                autocomplete.addListener('place_changed', notFoundCondition);
                            }

                        function  notFoundCondition() {
                            var place = autocomplete.getPlace();
                            if (!place.geometry) {
                                // User entered the name of a Place that was not suggested and
                                // pressed the Enter key, or the Place Details request failed.
                                window.alert("No details available for input: '" + place.name + "'");
                                return;
                            }
                        }

                        initialize();
                        var directionsService = new google.maps.DirectionsService;
                        var directionsDisplay = new google.maps.DirectionsRenderer;

                        directionsDisplay.setMap(map);
                        var onChangeHandler = function() {
                            console.log("onchage handler called");

                            try {
                                 end;
                            } catch(err) {
                                console.log("error");
                                alert("Select store!");
                            }


                            calculateAndDisplayRoute(directionsService, directionsDisplay);
                        };


                            function calculateAndDisplayRoute(directionsService, directionsDisplay) {
                                directionsService.route({
                                    origin: start,
                                    destination: end,
                                    travelMode: 'DRIVING'
                                }, function(response, status) {
                                    if (status === 'OK') {
                                        directionsDisplay.setDirections(response);
                                    } else {
                                        window.alert('Directions request failed due to ' + status);
                                    }
                                });
                            }

                         $("#searchButton").click(function() {

                                console.log("button clicked");

                                 geocoder = new google.maps.Geocoder();
                                 var address = document.getElementById("autocomplete").value;
                                 geocoder.geocode({'address': address, 'region': 'np'}, function (results, status) {
                                     if (status == google.maps.GeocoderStatus.OK) {
                                         var inp = results[0].geometry.location;

                                         var lat = results[0].geometry.location.lat();
                                         var lon = results[0].geometry.location.lng();

                                         console.log(address + " " + lat + " " + lon);

                                         //start point for route direction
                                         start = new google.maps.LatLng(lat, lon);
                                         //console.log(end);


                                         onChangeHandler();

                                     } else {
                                         alert("The searched location was not found.");
                                     }
                                 });

                         });


                    }  //end==> initMap()










                    </script>

            </div>
            <!-- end==> col-sm-8 -->
	    </div>
        <!-- end==> row -->

        <footer>
        <hr style="margin-bottom: 8px;">
           <p id="developer_txt" class="tx_ct">
              Developed by Sushil and Abhishek
           </p>
        </footer>
    </div>
    <!-- end==> body_wrapper -->
<?php
require_once 'layouts/header_footer/footer.php';
?>