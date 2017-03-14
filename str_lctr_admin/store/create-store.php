<?php
require_once '../../supports/initialize.php';
?>

<?php

if(isset($_POST["s_name"])) {
    $name = mysqli_real_escape_string($conn,$_POST['b_name']);
    $type = mysqli_real_escape_string($conn,$_POST['s_type']);
    $landline = mysqli_real_escape_string($conn,$_POST['s_landline']);
    $mobile = mysqli_real_escape_string($conn,$_POST['s_mobile']);
    $address = mysqli_real_escape_string($conn,$_POST['s_address']);
    $website = mysqli_real_escape_string($conn,$_POST['s_website']);
    $district = mysqli_real_escape_string($conn,$_POST['s_district']);
    $lat = mysqli_real_escape_string($conn,$_POST['s_lat']);
    $lon = mysqli_real_escape_string($conn,$_POST['s_lon']);

    $query  = "INSERT INTO store (name, type, landline, mobile, address, website, district, lat, lon) ";
    $query .= " VALUES ('$name', '$type', '$landline', '$mobile', '$address', '$district', '$lat', '$lon') ";

    $result = mysqli_query($conn, $query);

    if ($result === true) {

        echo "New store created successfully!";
    }else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {



        $output = '<div class="modal fade" id="create_store_modal" tabindex="-1" role="dialog" aria-labelledby="create_store_modal">';
        $output .= '   <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                 <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="create_store_modal">Create Store</h4>
                                 </div> <!-- modal-header -->
                    ';
        $output .= '            <div class="modal-body">';


        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Name</label>';
        $output .=                                  '<input type="text" class="form-control" id="s_name" name="s_name" required="">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Type</label>';
        $output .=                                  '<input type="text" class="form-control" id="s_type" name="s_type" required="">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Landline</label>';
        $output .=                                  '<input type="number" class="form-control" id="s_landline" name="s_landline" required="">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Mobile</label>';
        $output .=                                  '<input type="number" class="form-control" id="s_mobile" name="s_mobile" required="">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Address</label>';
        $output .=                                  '<input type="address" class="form-control" id="s_address" name="s_address" required="">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Website</label>';
        $output .=                                  '<input type="url" class="form-control" id="s_website" name="s_website" required="">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">District</label>';
        $output .=                                  '<input type="text" class="form-control" id="s_district" name="s_district" required="">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Latitude</label>';
        $output .=                                  '<input type="number" class="form-control" id="s_lat" name="s_lat" required="">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Longitude</label>';
        $output .=                                  '<input type="Number" class="form-control" id="s_lon" name="s_lon" required="">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Brand ID</label>';
        $output .=                                  '<input type="number" class="form-control" id="b_id" name="b_id" required="">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //modal footer button starts
        $output .= '                 <div class="modal-footer">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="store" onclick="createStoreA()" id="create_store_create" class="btn btn-primary">Create</button>';

        $output .=                  '</div><!-- modal-footer-->';
        //modal footer button ends


        $output .= '            </div> <!-- modal-body--->';
        $output .= '        </div> <!-- modal-content--->';
        $output .= '    </div> <!-- modal-dialog--->';
        $output .= ' </div> <!-- modal-fade--->';

        echo $output;
}

mysqli_close($conn);
?>