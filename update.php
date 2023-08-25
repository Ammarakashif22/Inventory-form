<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['item_id']; // Assuming your hidden input field is named 'item_id'
    $location = $_POST['location'];
    $department = $_POST['department'];
    $section = $_POST['section'];
    $emp_id = $_POST['emp_id'];
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $inventory_type = $_POST['inventory_type'];
    $inventory_id = $_POST['inventory_id'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $specification = $_POST['specification'];
    $ram = $_POST['ram'];
    $ssd_hdd = $_POST['ssd_hdd'];
    $service_tag = $_POST['service_tag'];
    $serial_number = $_POST['serial_number'];
    $condition_status = $_POST['condition_status'];
    $commissioning_date = $_POST['commissioning_date'];
    $upgrading_date = $_POST['upgrading_date'];
    $handover_date = $_POST['handover_date'];
    $remarks = $_POST['remarks'];
    $institute = $_POST['institute'];

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE inventory SET location=?, department=?, section=?, emp_id=?, name=?, designation=?, inventory_type=?, inventory_id=?, brand=?, model=?, specification=?, ram=?, ssd_hdd=?, service_tag=?, serial_number=?, condition_status=?, commissioning_date=?, upgrading_date=?, handover_date=?, remarks=?, institute=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("ssssssssssssssssssssss", $location, $department, $section, $emp_id, $name, $designation, $inventory_type, $inventory_id, $brand, $model, $specification, $ram, $ssd_hdd, $service_tag, $serial_number, $condition_status, $commissioning_date, $upgrading_date, $handover_date, $remarks, $institute, $id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: view.php"); // Redirect back to the view page
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
