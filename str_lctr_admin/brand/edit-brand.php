
<?php
require_once '../../supports/initialize.php';
?>

<?php

if(isset($_POST["b_name"])){

    $q = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn,$_POST['b_name']);
    $item_id = mysqli_real_escape_string($conn,$_POST['i_id']);
    
    $query = "UPDATE brand SET name = '{$name}', item_id = '{$item_id}' WHERE id = $q ";

    $result = mysqli_query($conn, $query);

    if ($result === true) {
        echo "Brand info edited successfully!";
    }else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {

$q = $_GET['q'];

$sql= "SELECT * FROM brand WHERE id = $q";

$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {

        $output = '<div class="modal fade" id="edit_brand_modal" tabindex="-1" role="dialog" aria-labelledby="edit_brand_modal">';
        $output .= '   <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                 <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="edit_brand_modal">Edit Brand</h4>
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
        $output .=                                  '<input type="hidden" id="b_id" value="' . $row["id"] . '">';
        $output .=                                  '<input type="text" class="form-control" id="brand_name" value="' . $row["name"] . '">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Item ID</label>';
        $output .=                                  '<input type="text" class="form-control" id="item_id" value="' . $row["item_id"] .'">';

        $output .=                  '</div><!-- form-group-->';
        //repeat form ends
        $output .= '            </div> <!-- modal-body--->';

        $output .= '            <div class="modal-footer">';
        $output .= '            <button type="button" class="btn btn-defaut" data-dismiss="modal">Close</button>';
        $output .= '            <button type="button" onclick="editBrandA();" class="btn btn-primary"> Edit </button>';
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