<?php
require_once '../supports/initialize.php';
session_start();
?>
<?php
if(isset($_POST["login"])){
    $username = mysqli_escape_string($conn, $_POST["username"]);
    $password = mysqli_escape_string($conn, $_POST["password"]);

    //print_r($_POST);

    if($username === "a" &&  $password === "b"){
        $_SESSION["logged_in"] = true;
        redirect("dashboard.php");
        exit;
    }else {
        redirect("index.php");
    }
}

?>
<?php
require_once '../assets/layouts/admin_header.php';
?>



    <body id="body_wrapper">
    <div class="container">
        <div id="site-top">
            <div class="row">
                <div id="menu" class="col-sm-8 ">
                    <a id="mn_faq" href="faq.php"><p>FAQ</p></a>
                    <a id="mn_about" href="about.php"><p>ABOUT</p></a>
                    <a id="mn_contact" href="contact.php"><p>CONTACT</p></a>
                </div>

                <div id="social_media" class="col-sm-4">
                    <a id="s_facebook" href="#">f</a>
                    <a id="s_twitter" href="#">t</a>
                    <a id="s_youtube" href="#">y</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-sm-4" >
                <a href="http://localhost/storelocator/index.php">
                    <h2 id="store_mapper_logo">
                        Store Mapper
                    </h2>
                </a>
                <br/>



            </div>
            <!-- end==>col-sm-4 -->
            <div class="right col-sm-8">





                <!-- end==> ui-form-->
            </div>
            <!-- end==> col-sm-8 -->
        </div>
        <!-- end==> row -->

        <hr/>

        <div class="row">

            <div class="col-sm-4 col-sm-offset-4">
                <h4>Enter username and password.</h4>

                <form id="myForm" action="index.php" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <button type="submit" name="login" class="btn btn-default">Login</button>
                </form>



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
require_once '../assets/layouts/admin_footer.php';
?>