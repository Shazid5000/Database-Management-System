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
    // Retrieve data from the form
    $update_title = $_POST["update_title"];
    $new_author = $_POST["new_author"];
    $new_published_year = $_POST["new_published_year"];

    // SQL query to update the book based on its title
    $sql = "UPDATE books SET author = '$new_author', published_year = '$new_published_year' WHERE title = '$update_title'";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the index.html after successful update
        header("Location: index.html");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
