<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inventory_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $location = $_POST["location"];
    $department = $_POST["department"];
    $section = $_POST["section"];
    $emp_id = $_POST["empId"];
    $name = $_POST["name"];
    $designation = $_POST["designation"];
    $inventory_type = $_POST["inventoryType"];
    $inventory_id = $_POST["inventoryId"];
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $specification = $_POST["specification"];
    $ram = $_POST["ram"];
    $ssdHdd = $_POST["ssdHdd"];
    $serviceTag = $_POST["serviceTag"];
    $serialNumber = $_POST["serialNumber"];
    $condition = $_POST["condition"];
    $commissioningDate = $_POST["commissioningDate"];
    $upgradingDate = $_POST["upgradingDate"];
    $handoverDate = $_POST["handoverDate"];
    $remarks = $_POST["remarks"];
    $institute = $_POST["institute"];

    // SQL query to insert form data into the database table
    $sql = "INSERT INTO inventory (location, department, section, emp_id, name, designation, inventory_type, inventory_id, brand, model, specification, ram, ssd_hdd, service_tag, serial_number, condition_status, commissioning_date, upgrading_date, handover_date, remarks, institute)
            VALUES ('$location', '$department', '$section', '$emp_id', '$name', '$designation', '$inventory_type', '$inventory_id', '$brand', '$model', '$specification', '$ram', '$ssdHdd', '$serviceTag', '$serialNumber', '$condition', '$commissioningDate', '$upgradingDate', '$handoverDate', '$remarks', '$institute')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to success page
        header("Location: success.php");
        exit; // Important to prevent further execution of the script
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   


    $conn->close();
}
?>
