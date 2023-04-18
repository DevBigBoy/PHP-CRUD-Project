<?php
include 'connect.php';

if(isset($_GET['userId'])){
    $id = $_GET['userId'];
    $sql = "DELETE FROM `users` WHERE id = {$id}";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:index.php");
    } else{
        die("Connection failed: " . $conn->connect_error);
    }

}
?>