<?php
// Database credentials
$servername = "localhost"; // Change to your server's name
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "university_courses"; // Name of the database
// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check the connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// Query to fetch semesters and courses
$sql = "
SELECT semesters.name as semester_name, courses.course_code, courses.course_name
FROM courses
INNER JOIN semesters ON courses.semester_id = semesters.id
ORDER BY semesters.id, courses.id;
";
$result = $conn->query($sql);
// HTML start
echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>University Courses</title>
<link rel="stylesheet" href="style.css"> <!-- Link to the external CSS file -->
</head>
<body>
<h1>University Courses by Semester</h1>';
// Check if there are results
if ($result->num_rows > 0) {
$current_semester = '';
// Output data for each row
while ($row = $result->fetch_assoc()) {
// If the semester changes, print a new header
if ($current_semester != $row["semester_name"]) {
if ($current_semester != '') {
// Close the previous table
echo "</table>";
}
// Update the current semester and print the semester name
$current_semester = $row["semester_name"];
echo "<h2>" . $current_semester . "</h2>";
echo "<table>
<tr>
<th>Course Code</th>
<th>Course Name</th>
</tr>";
}
// Print the course information
echo "<tr>
<td>" . $row["course_code"] . "</td>
<td>" . $row["course_name"] . "</td>
</tr>";
}
// Close the last table
echo "</table>";
} else {
echo "<p>No courses found.</p>";
}
// HTML end
echo '</body></html>';
// Close the connection
$conn->close();
?>