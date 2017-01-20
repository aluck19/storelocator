<?php
require_once 'supports/initialize.php';
?>

<?php
    $store_id = mysqli_real_escape_string($conn,$_POST['r_store_id']);
    $topic = mysqli_real_escape_string($conn,$_POST['r_topic']);
    $name = mysqli_real_escape_string($conn,$_POST['r_name']);
    $email = mysqli_real_escape_string($conn,$_POST['r_email']);
    $message = mysqli_real_escape_string($conn,$_POST['r_message']);
    $date = date("Y-m-d H-i-s");

    $query = "INSERT INTO report (store_id, topic, r_name, email, message,datetime)
              VALUES ($store_id, '$topic', '$name', '$email', '$message', '$date')";

    $result = mysqli_query($conn, $query);

    if ($result === true) {
        email('techlekhnp@gmail.com', 'techlekhnp@gmail.com', 'StoreMapper by TechLekh.com', $topic, $message);
        echo "Report has been successfully submitted!";
    }else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
?>