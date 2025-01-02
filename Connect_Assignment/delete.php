<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the script is accessed via a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve title of the book to delete from the form data
    $delete_title = $_POST["delete_title"];

    // SQL query to delete the book based on its title
    $sql = "DELETE FROM books WHERE title = '$delete_title'";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the index.html after successful deletion
        header("Location: index.html");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
