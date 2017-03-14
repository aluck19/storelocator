<?php
require_once '../../supports/initialize.php';
?>

<?php
$q = $_GET['q'];

    $query = "DELETE FROM brand WHERE id = $q ";

    $result = mysqli_query($conn, $query);

        if ($result === true) {

            echo "<script> alert('Brand deleted successfully!');";
            header ('Location: http://localhost/storelocator/str_lctr_admin/dashboard.php');
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

mysqli_close($conn);
?>