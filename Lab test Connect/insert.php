<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["stud_id"];
    $course_number = $_POST["course_no"];

    // Check if the student_id exists in the student table
    $check_student = "SELECT * FROM student WHERE stud_id = $student_id";
    $result = $conn->query($check_student);
    if ($result->num_rows == 0) {
        die("Error: Student ID does not exist.");
    }

    // Check if the course_number exists in the course_offerings table
    $check_course = "SELECT * FROM course_offerings WHERE course_no = $course_number";
    $result = $conn->query($check_course);
    if ($result->num_rows == 0) {
        die("Error: Course number does not exist.");
    }

    $sql = "INSERT INTO takes (student_id, course_no) VALUES ('$student_id', '$course_number')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
