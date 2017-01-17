<?php
require_once 'supports/initialize.php';
?>

<?php
$q = strtolower($_GET['q']);

$sql="SELECT * FROM item WHERE name = '$q'";


$result = mysqli_query($conn,$sql);
$row = $result->fetch_assoc();
$item_id =  $row["id"];

$sql = "Select * from brand where item_id = $item_id";
$brand = mysqli_query($conn,$sql);


if ($brand->num_rows > 0) {

    while($row = mysqli_fetch_assoc($brand)) {

        echo "<option>" . ucfirst($row['name']) . "</option>";

    }

   }
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>