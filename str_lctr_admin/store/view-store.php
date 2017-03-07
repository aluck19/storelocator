<?php
require_once '../../supports/initialize.php';
?>

<?php
$q = $_GET['q'];

$sql= "SELECT * FROM store WHERE id = $q";

$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
   // echo "hello";
    while($row = mysqli_fetch_assoc($result)) {

        $output = '<div class="modal fade" id="view_store_modal" tabindex="-1" role="dialog" aria-labelledby="view_store_modal">';
        $output .= '   <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                 <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="view_store_modal">View Store</h4>
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
        $output .=                                  '<p>' . $row["name"] . '</p>';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Type</label>';
        $output .=                                  '<p>' .  $row["type"] . '</p>';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Landline</label>';
        $output .=                                  '<p>' . $row["landline"] . '</p>';
        $output .=                  '</div><!-- form-group-->';

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Mobile</label>';
        $output .=                                  '<p>' . $row["mobile"] . '</p>';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends


        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Address</label>';
        $output .=                                  '<p>' . nl2br($row["email"]) . '</p>';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Website</label>';
        $output .=                                  '<p>' . $row["website"] . '</p>';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">District</label>';
        $output .=                                  '<p>' . $row["district"] . '</p>';
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