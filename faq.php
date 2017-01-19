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
                <form class="form-inline" action="index.php" method="POST">
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



        <div class="col-sm-12" id="store_left_bar">
            <h2 class="dp_in_bl">
               Frequently Asked Questions
            </h2>


            <div class="panel-group" id="accordion">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Is account registration required?</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                Account registration at <strong>PrepBootstrap</strong> is only required if you will be selling or buying themes.
                                This ensures a valid communication channel for all parties involved in any transactions.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Can I submit my own Bootstrap templates or themes?</a>
                            </h4>
                        </div>
                        <div id="collapseTen" class="panel-collapse collapse">
                            <div class="panel-body">
                                A lot of the content of the site has been submitted by the community. Whether it is a commercial element/template/theme
                                or a free one, you are encouraged to contribute. All credits are published along with the resources.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">What is the currency used for all transactions?</a>
                            </h4>
                        </div>
                        <div id="collapseEleven" class="panel-collapse collapse">
                            <div class="panel-body">
                                All prices for themes, templates and other items, including each seller's or buyer's account balance are in <strong>USD</strong>
                            </div>
                        </div>
                    </div>
            </div>


            </div>
            <!-- end==> col-sm-12 -->
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