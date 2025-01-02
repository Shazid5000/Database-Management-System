<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_test"; // Update this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the script is accessed via a GET request
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT stud_id, course_no FROM student, course_offerings";
    $result = $conn->query($sql);

    if ($result === false) {
        trigger_error('Error: ' . $conn->error, E_USER_ERROR);
    }

    echo "<h2>All Info</h2>";

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row["stud_id"]} by {$row["course_no"]}</li>";
        }
        echo "</ul>";
    } else {
        echo "0 results";
    }
}

// Close connection
$conn->close();
?>
