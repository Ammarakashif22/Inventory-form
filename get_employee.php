<?php
// Include your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the employee ID from the AJAX request
$empId = $_GET['empId'];

// Query the inventory table to fetch data for the provided employee ID
$sql = "SELECT * FROM inventory WHERE emp_id = '$empId'";
$result = $conn->query($sql);

// Check for query error
if ($result === false) {
    echo "Query error: " . $conn->error;
    exit(); // Stop further execution
}

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Loop through the result and display the data
    while ($row = $result->fetch_assoc()) {
        echo "Emp ID: " . $row['emp_id'] . "<br>";
        echo "Name: " . $row['name'] . "<br>";
        echo "Designation: " . $row['designation'] . "<br>";
        echo "Institute: " . $row['institute'] . "<br>";
        echo "Department: " . $row['department'] . "<br>";
        // ... (output other fields as needed)
    }
} else {
    echo "No records found for the provided Employee ID.";
}

$conn->close();
?>
