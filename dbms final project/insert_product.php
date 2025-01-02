<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ProductName = $_POST["productName"];
    // Retrieve product ID from the form
    $ProductID = $_POST["productId"]; // Corrected here
    $Description = $_POST["description"];
    $Price = $_POST["price"];
    $Quantity = $_POST["quantity"];

    $sql = "INSERT INTO products (ID, product_Name, description, price, quantity) VALUES ('$ProductID', '$ProductName', '$Description', '$Price', '$Quantity')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
