<?php
require_once '../../supports/initialize.php';
?>

<?php
$q = $_GET['q'];

$sql= "SELECT * FROM report WHERE id = $q";

$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
   // echo "hello";
    while($row = mysqli_fetch_assoc($result)) {

        $output = '<div class="modal fade" id="view_report_modal" tabindex="-1" role="dialog" aria-labelledby="view_report_modal">';
        $output .= '   <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                 <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="view_report_modal">View Report</h4>
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
                                            <label for="topic" class="control-label">StoreID</label>';
        $output .=                                  '<p>' .  nl2br($row["store_id"]) . '</p>';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">DateTime</label>';
        $output .=                                  '<p>' .  nl2br($row["datetime"]) . '</p>';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Topic</label>';
        $output .=                                  '<p>' . $row["topic"] . '</p>';
        $output .=                  '</div><!-- form-group-->';

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Name</label>';
        $output .=                                  '<p>' . $row["r_name"] . '</p>';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends


        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Email</label>';
        $output .=                                  '<p>' . $row["email"] . '</p>';
        $output .=                  '</div><!-- form-group-->';
        //repeat form ends

        //repeat form starts
        $output .= '                 <div class="form-group">
                                            <label for="topic" class="control-label">Message</label>';
        $output .=                                  '<p>' .  nl2br($row["message"]) . '</p>';
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