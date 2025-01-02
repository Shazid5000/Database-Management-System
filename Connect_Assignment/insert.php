<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it does not exist
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === FALSE) {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($dbname);

// Check if the "books" table exists, if not, create it
$sql_create_table = "CREATE TABLE IF NOT EXISTS books (
    id INT(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    published_year INT(100) NOT NULL
)";
if ($conn->query($sql_create_table) === FALSE) {
    die("Error creating table: " . $conn->error);
}

// Check if the script is accessed via a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $published_year = $_POST["published_year"];

    // Insert data into the "books" table
    $sql_insert = "INSERT INTO books (title, author, published_year) VALUES ('$title', '$author', $published_year)";
    
    if ($conn->query($sql_insert) === TRUE) {
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
