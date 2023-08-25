<?php
include 'connection.php';

if (isset($_GET['empId'])) {
    $empId = $_GET['empId'];

    $sql = "SELECT name, designation, institute, department FROM employees WHERE emp_id = '$empId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Concatenate the values with a delimiter (| in this case)
        $response = $row['name'] . '|' . $row['designation'] . '|' . $row['institute'] . '|' . $row['department'];
        echo $response;
    }
}
?>
