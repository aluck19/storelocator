<?php
require_once 'supports/initialize.php';
?>

<?php
    $store_id = $_POST['r_store_id'];
    $topic = $_POST['r_topic'];
    $name = $_POST['r_name'];
    $email = $_POST['r_email'];
    $message = $_POST['r_message'];

    $query = "INSERT INTO report (store_id, topic, r_name, email, message)
              VALUES ($store_id, '$topic', '$name', '$email', '$message')";

    $result = mysqli_query($conn, $query);

    if ($result === true) {
        email('techlekhnp@gmail.com', 'techlekhnp@gmail.com', 'StoreMapper: Query on  ', 'Check', 'Checked');
        echo "Report has been successfully submitted!";
    }else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
?>