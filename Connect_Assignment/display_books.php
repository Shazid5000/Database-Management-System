<!-- display_books.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the script is accessed via a GET request
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT id, title, author, published_year FROM books";
    $result = $conn->query($sql);

    if ($result === false) {
        trigger_error('Error: ' . $conn->error, E_USER_ERROR);
    }

    echo "<h2>All Books</h2>";

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row["title"]} by {$row["author"]} ({$row["published_year"]})</li>";
        }
        echo "</ul>";
    } else {
        echo "0 results";
    }
}

$conn->close();
?>
