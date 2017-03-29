
<?php
require_once '../../supports/initialize.php';
?>

<?php

if(isset($_POST["s_name"])){

    $q = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn,$_POST['s_name']);
    $type = mysqli_real_escape_string($conn,$_POST['s_type']);
    $landline = mysqli_real_escape_string($conn,$_POST['s_landline']);
    $mobile = mysqli_real_escape_string($conn,$_POST['s_mobile']);
    $address = mysqli_real_escape_string($conn,$_POST['s_address']);
    $website = mysqli_real_escape_string($conn,$_POST['s_website']);
    $district = mysqli_real_escape_string($conn,$_POST['s_district']);
    $lat = mysqli_real_escape_string($conn,$_POST['s_lat']);
    $lon = mysqli_real_escape_string($conn,$_POST['s_lon']);
    $brand_id = mysqli_real_escape_string($conn, $_POST['b_id']);
    
    $query = "UPDATE store SET name = '{$name}', type = '{$type}', landline = '{$landline}', mobile = '{$mobile}', 
    address = '{$address}', website = '{$website}', lat = '{$lat}', lon = '{$lon}', brand_id = '{$brand_id}' WHERE id = $q ";

    $result = mysqli_query($conn, $query);

    if ($result === true) {
        echo "Store info edited successfully!";
    }else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {

$q = $_GET['q'];

$sql= "SELECT * FROM store WHERE id = $q";

$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {

        $output = '<div class="modal fade" id="edit_store_modal" tabindex="-1" role="dialog" aria-labelledby="edit_store_modal">';
        $output .= '   <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                 <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="edit_store_modal">Edit Store</h4>
                                 </div> <!-- modal-header -->
                    ';
        $output .= '            <div class="modal-body">';


        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">#</label>';
        $output .=                                  '<p>' . $row["id"] . '</p>';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Name</label>';
        $output .=                                  '<input type="hidden" id="store_id" value="' . $row["id"] . '">';
        $output .=                                  '<input type="text" class="form-control" id="store_name" value="' . $row["name"] . '">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Type </label>';
        $output .=                                  '<input type="text" class="form-control" id="store_type" value="' . $row["type"] .'">';
        $output .=                  '</div><!-- form-group-->';

        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Landline</label>';
        $output .=                                  '<input type="text" class="form-control" id="store_landline" value="' . $row["landline"] .'">';
        $output .=                  '</div><!-- form-group-->';

        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label"> Mobile </label>';
        $output .=                                  '<input type="text" class="form-control" id="store_mobile" value="' . $row["mobile"] .'">';
        $output .=                  '</div><!-- form-group-->';

        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label"> Address </label>';
        $output .=                                  '<input type="address" class="form-control" id="store_address" value="' . $row["address"] .'">';
        $output .=                  '</div><!-- form-group-->';

        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label"> Website </label>';
        $output .=                                  '<input type="url" class="form-control" id="store_website" value="' . $row["website"] .'">';
        $output .=                  '</div><!-- form-group-->';

        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label"> District </label>';
        $output .=                                  '<input type="text" class="form-control" id="store_district" value="' . $row["district"] .'">';
        $output .=                  '</div><!-- form-group-->';

        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label"> Latitude </label>';
        $output .=                                  '<input type="number" class="form-control" id="store_lat" value="' . $row["lat"] .'">';
        $output .=                          '<label for="topic" class="control-label"> Longitude </label>';
        $output .=                                  '<input type="number" class="form-control" id="store_lon" value="' . $row["lon"] .'">';
        $output .=                  '</div><!-- form-group-->';

        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Brand ID </label>';
        $output .=                                  '<input type="number" class="form-control" id="brand_id" value="' . $row["brand_id"] .'">';
        $output .=                  '</div><!-- form-group-->';

        //repeat form ends
        $output .= '            </div> <!-- modal-body--->';

        $output .= '            <div class="modal-footer">';
        $output .= '            <button type="button" class="btn btn-defaut" data-dismiss="modal">Close</button>';
        $output .= '            <button type="button" onclick="editStoreA();" class="btn btn-primary"> Edit </button>';
        $output .= '        </div> <!-- modal-footer--->';
        
        $output .= '        </div> <!-- modal-content--->';
        $output .= '    </div> <!-- modal-dialog--->';
        $output .= ' </div> <!-- modal-fade--->';

        echo $output;
    }
}
else {
    echo $q;
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>