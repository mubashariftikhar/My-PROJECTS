<?php
$delete = false;
$servername = "localhost";
$username = "root";
$password = "";
$database = "myshop_crud";
$connection = new mysqli($servername, $username, $password, $database);
$result = $connection->query($sql);
$row = $result->fetch_assoc();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `clients` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
}

header("location:index.php");
exit;
