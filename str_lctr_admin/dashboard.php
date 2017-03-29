<?php
require_once '../supports/initialize.php';
session_start();
?>
<?php check_logged_in();?>
<?php
require_once '../assets/layouts/admin_header.php';
?>

<?php
function getItem($item_id) {
    
    $smartphone = "Smartphone";
    $laptop = "Laptop";

    if ($item_id == 1) {
        return $laptop;
    } else if ($item_id == 2){
        return $smartphone;
    }
}
?>


   
    <body id="body_wrapper">
    <div class="container ">
        <div id="site-top">
            <div class="row">
                <div id="menu" class="col-sm-8 ">
                    <a id="mn_faq" href="../faq.php"><p>FAQ</p></a>
                    <a id="mn_about" href="../about.php"><p>ABOUT</p></a>
                    <a id="mn_contact" href="../contact.php"><p>CONTACT</p></a>
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

        <div class="row" id="admin_bar">

                <div class="col-sm-6">
                    Welcome, Admino Gustavo!
                </div>

                <div class="col-sm-6 right">
                    <a id="logout_btn" href="logout.php">Logout</a>
                </div>


        </div>



        <div class="row">



            <div class="col-sm-12">

                <div id="crud_pop_up">

                </div>



                <!-- Nav tabs --><div class="card" id="tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#admin_reports" aria-controls="admin_report" role="tab" data-toggle="tab">Reports</a></li>
                        <li role="presentation"><a href="#admin_items" aria-controls="admin_items" role="tab" data-toggle="tab">Items</a></li>
                        <li role="presentation"><a href="#admin_brands" aria-controls="admin_brands" role="tab" data-toggle="tab">Brands</a></li>
                        <li role="presentation"><a href="#admin_stores" aria-controls="admin_stores" role="tab" data-toggle="tab">Stores</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="admin_reports">


                            <div>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Store ID</th>
                                        <th>Topic</th>
                                        <th>DateTime</th>
                                        <th>View</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    $s_report  = "SELECT * FROM report ";
                                    $reports = mysqli_query($conn, $s_report);

                                    if ($reports->num_rows > 0) {
                                        while ($row = $reports->fetch_assoc()) {
                                            $output  = '<tr>';
                                            $output .= '<td id="r_id">' .$row["id"] . '</td>';
                                            $output .= '<td>' .$row["store_id"] . '</td>';
                                            $output .= '<td>' .$row["topic"] . '</td>';
                                            $output .= '<td>' .$row["datetime"] . '</td>';
                                            $output .= '<td>' . '<button type="button"  onclick="viewReport(' . $row["id"]. ')" id="view_report" class="btn btn-primary">View</button>'. '</td>';

                                            echo $output;
    
                                          

                                        }
                                    }else {
                                        
                                    }
                                     ?>



                                    </tbody>
                                </table>
                            </div>




                        </div>

                        <div role="tabpanel" class="tab-pane" id="admin_items">

                            <button type="button"  onclick="createItem()" id="create_item" class="btn btn-primary">Create</button>

                            <div>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    $s_report  = "SELECT * FROM item ";
                                    $reports = mysqli_query($conn, $s_report);

                                    if ($reports->num_rows > 0) {
                                        while ($row = $reports->fetch_assoc()) {
                                            $output = '<tr>';
                                            $output .= '<td id="r_id">' .$row["id"] . '</td>';
                                            $output .= '<td>' .$row["name"] . '</td>';

                                            $output .= '<td>' . '<button type="button"  onclick="editItem(' . $row["id"]. ')" id="edit_item" class="btn btn-primary">Edit</button>'. '</td>';
                                            $output .= '<td>' . '<button type="button"  onclick="deleteItem(' . $row["id"]. ')" id="delete_item" class="btn btn-primary">Delete</button>'. '</td>';

                                            echo $output;

                                        }
                                    }else {

                                    }
                                    ?>



                                    </tbody>
                                </table>
                            </div>


                        </div>
                        <div role="tabpanel" class="tab-pane" id="admin_brands">

                            <button type="button"  onclick="createBrand()" id="create_brand" class="btn btn-primary">Create</button>

                            <div>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Item</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    $s_report  = "SELECT * FROM brand ";
                                    $reports = mysqli_query($conn, $s_report);

                                    if ($reports->num_rows > 0) {
                                        while ($row = $reports->fetch_assoc()) {
                                            $output = '<tr>';
                                            $output .= '<td id="r_id">' .$row["id"] . '</td>';
                                            $output .= '<td>' .$row["name"] . '</td>';
                                            $output .= '<td>' . getItem($row["item_id"]) . '</td>';

                                            $output .= '<td>' . '<button type="button"  onclick="editBrand(' . $row["id"]. ')" id="edit_brand" class="btn btn-primary">Edit</button>'. '</td>';
                                            $output .= '<td>' . '<button type="button"  onclick="deleteBrand(' . $row["id"]. ')" id="delete_brand" class="btn btn-primary">Delete</button>'. '</td>';

                                            echo $output;

                                        }
                                    }else {

                                    }
                                    ?>



                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="admin_stores">

                            <button type="button"  onclick="createStore()" id="create_store" class="btn btn-primary">Create</button>

                            <div>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>View </th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    $s_report  = "SELECT * FROM store ";
                                    $reports = mysqli_query($conn, $s_report);

                                    if ($reports->num_rows > 0) {
                                        while ($row = $reports->fetch_assoc()) {
                                            $output = '<tr>';
                                            $output .= '<td id="r_id">' .$row["id"] . '</td>';
                                            $output .= '<td>' .$row["name"] . '</td>';

                                            $output .= '<td>' . '<button type="button"  onclick="viewStore(' . $row["id"]. ')" id="show_store" class="btn btn-primary">Details</button>'. '</td>';
                                            $output .= '<td>' . '<button type="button"  onclick="editStore(' . $row["id"]. ')" id="edit_store" class="btn btn-primary">Edit</button>'. '</td>';
                                            $output .= '<td>' . '<button type="button"  onclick="deleteStore(' . $row["id"]. ')" id="delete_store" class="btn btn-primary">Delete</button>'. '</td>';

                                            echo $output;

                                        }
                                    }else {

                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

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

    <script>
        $(document).ready(function(){
//create item
            $("#create_item_create").click(function(){

                console.log("called");

                var name = $("#i_name").val();

                // Returns successful data submission message when the entered information is stored in push_files.
                var dataString = 'i_name='+ name ;
                if(name=='')
                {
                    alert("Please fill all the form fields!");
                    //console.log("Error");
                }
                else
                {
                    // AJAX Code To Submit Form.
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/storelocator/str_lctr_admin/item/create-item.php",
                        data: dataString,
                        cache: true,
                        success: function(result){
                            alert(result);
                            $('#create_item_modal').modal('hide');
                            // initializes and invokes show immediately
                        }
                    } );
                }
                return false;
            });
        });


    </script>
    <!-- end==> body_wrapper -->
<?php
require_once '../assets/layouts/admin_footer.php';
?>