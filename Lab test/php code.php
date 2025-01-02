<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT student.name, course_offerings.room, course_offerings.time
        FROM student
        INNER JOIN course_offerings
        ON student.sid = course_offerings.sid";