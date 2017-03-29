<?php
require_once '../../supports/initialize.php';
?>

<?php

if(isset($_POST["b_name"])){
    $name = mysqli_real_escape_string($conn,$_POST['b_name']);
    $item_id = mysqli_real_escape_string($conn,$_POST['i_id']);
    
    $query = "INSERT INTO brand (name, item_id)  VALUES ('$name', '$item_id')";

    $result = mysqli_query($conn, $query);

    if ($result === true) {

        echo "New brand created successfully!";
    }else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {



        $output = '<div class="modal fade" id="create_brand_modal" tabindex="-1" role="dialog" aria-labelledby="create_brand_modal">';
        $output .= '   <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                 <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="create_item_modal">Create Brand</h4>
                                 </div> <!-- modal-header -->
                    ';
        $output .= '            <div class="modal-body">';


        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Name</label>';
        $output .=                                  '<input type="hidden" id="b_id" name="b_id">';
        $output .=                                  '<input type="text" class="form-control" id="b_name" name="b_name" required="">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Item ID</label>';
        $output .=                                  '<input type="number" class="form-control" id="i_id" name="i_id" required="">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends


        //modal footer button starts
        $output .= '                 <div class="modal-footer">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="brand" onclick="createBrandA()" id="create_brand_create" class="btn btn-primary">Create</button>';

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