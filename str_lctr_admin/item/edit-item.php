<?php
require_once '../../supports/initialize.php';
?>

<?php
echo "Hello";
$q = $_GET['q'];

$sql= "SELECT * FROM item WHERE id = $q";

$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    // echo "hello";
    while($row = mysqli_fetch_assoc($result)) {

        $output = '<div class="modal fade" id="edit_item_modal" tabindex="-1" role="dialog" aria-labelledby="edit_item_modal">';
        $output .= '   <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                 <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="view_report_modal">Edit Item</h4>
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
        $output .=                                  '<input type="text" class="form-control" id="item_name" value="$row['name']">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">DateTime</label>';
        $output .=                                  '<input type="text" class="form-control" id="datetime" value="$row['datetime']">';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        $output .= '            </div> <!-- modal-body--->';
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

mysqli_close($conn);
?>