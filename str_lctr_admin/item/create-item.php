<?php
require_once '../../supports/initialize.php';
?>

<?php

if(isset($_POST["i_name"])){
    $name = mysqli_real_escape_string($conn,$_POST['i_name']);
    $datetime = date("Y-m-d H-i-s");

    $query = "INSERT INTO item (name, datetime)  VALUES ('$name', '$datetime')";

    $result = mysqli_query($conn, $query);

    if ($result === true) {

        echo "New item created successfully!";
    }else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {




        $output = '<div class="modal fade" id="create_item_modal" tabindex="-1" role="dialog" aria-labelledby="create_item_modal">';
        $output .= '   <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                 <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="view_report_modal">Create Item</h4>
                                 </div> <!-- modal-header -->
                    ';
        $output .= '            <div class="modal-body">';


        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Name</label>';
        $output .=                                  '<input type="text" class="form-control" id="i_name" name="i_name" required="">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends


        //modal footer button starts
        $output .= '                 <div class="modal-footer">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="item" id="create_item_create" class="btn btn-primary">Create</button>';

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