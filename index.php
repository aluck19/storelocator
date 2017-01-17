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
                    <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
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
                    <div  class="active section">
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
                                            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
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
                            });
                            return marker;
                        }

                        //call create market and place the clicked locations on map
                        for (var i = 0; i < locations.length; i++) {
                            gmarkers[locations[i][0]]=
                                createMarker(new google.maps.LatLng(locations[i][1],locations[i][2]), locations[i][0]);
                        }

                    } //end==> initMap()


                    </script>

            </div>
            <!-- end==> col-sm-8 -->
	    </div>
        <!-- end==> row -->

        <footer>
        <hr>
           <p id="developer_txt" class="tx_ct">
               Made with ... by Sushil and Abhishek.
           </p>
        </footer>
    </div>
    <!-- end==> body_wrapper -->
<?php
require_once 'layouts/header_footer/footer.php';
?>