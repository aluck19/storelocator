<?php
require_once '../../supports/initialize.php';
?>

<?php
$q = $_GET['q'];

    $query = "DELETE FROM item WHERE id = $q ";

    $result = mysqli_query($conn, $query);

        if ($result === true) {

            echo "<script> alert('Item deleted successfully!');";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

mysqli_close($conn);
?>