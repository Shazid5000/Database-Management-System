<?php
include("connection.php");

$id = $_GET['productId'];

$query = "DELETE FROM products WHERE ID = '$id'";

$data = mysqli_query($conn, $query);
if ($data) {
    echo "Record deleted";
}
else {
    echo "Failed to Delete";
}
?>