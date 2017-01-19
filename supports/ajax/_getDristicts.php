<?php
    require_once '../initialize.php';
?>

<?php
    $q = strtolower($_GET['q']);

    $sql="SELECT * FROM brand WHERE name = '$q'";

    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    $brand_id =  $row["id"];

    $sql = "Select * from store where brand_id = $brand_id GROUP BY district";

    $store = mysqli_query($conn,$sql);

    if ($store->num_rows > 0) {
        while($row = mysqli_fetch_assoc($store)) {
            echo "<option>" . ucfirst($row['district']) . "</option>";
        }
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>