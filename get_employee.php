<?php
// Include your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['empId'];
    
    $sql = "SELECT * FROM employees WHERE id = '$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h4>Employee Information</h4>";
        echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
        echo "<p><strong>Designation:</strong> " . $row['designation'] . "</p>";
        echo "<p><strong>Institute:</strong> " . $row['institute'] . "</p>";
        echo "<p><strong>Department:</strong> " . $row['department'] . "</p>";
    } else {
        echo "<p>No employee found with the provided Employee ID.</p>";
    }
}

$conn->close();
?>
