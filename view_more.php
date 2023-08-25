<?php
// Include necessary files (formhandling.php, connection.php)
Include 'formhandling.php';
Include 'connection.php';

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query the database to get the details for this item
    $sql = "SELECT * FROM inventory WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Item not found.";
        exit();
    }
} else {
    echo "Item ID not provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Details</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    /* Additional custom styles */
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    .bold-label {
        font-weight: bold;
    }

</style>

</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-0">Inventory Details</h2>
        <div class="row mb-3">
            <div class="col-md-12 text-right">
                <a href="view.php" class="btn btn-primary">Back to View</a>
            </div>
        </div>
        <form id="inventoryForm" action="Nform.php" method="POST">
            <!-- All form fields with pre-filled values -->
            <div class="form-row">
                <label for="empId" class="col-md-6 bold-label">Emp ID:</label>
                <div class="col-md-6"><?php echo $row['emp_id']; ?></div>
            </div>
            <div class="form-row">
                <label for="name" class="col-md-6 bold-label">Name:</label>
                <div class="col-md-6"><?php echo $row['name']; ?></div>
            </div>
            <div class="form-row">
                <label for="designation" class="col-md-6 bold-label">Designation:</label>
                <div class="col-md-6"><?php echo $row['designation']; ?></div>
            </div>
            <div class="form-row">
                <label for="department" class="col-md-6 bold-label">Department:</label>
                <div class="col-md-6"><?php echo $row['department']; ?></div>
            </div>
            <div class="form-row">
                <label for="location" class="col-md-6 bold-label">Location:</label>
                <div class="col-md-6"><?php echo $row['location']; ?></div>
            </div>
            <div class="form-row">
                <label for="institute" class="col-md-6 bold-label">Institute:</label>
                <div class="col-md-6"><?php echo $row['institute']; ?></div>
            </div>
            <div class="form-row">
                <label for="section" class="col-md-6 bold-label">Section & Subsection:</label>
                <div class="col-md-6"><?php echo $row['section']; ?></div>
            </div>
            <div class="form-row">
                <label for="inventoryType" class="col-md-6 bold-label">Inventory Type:</label>
                <div class="col-md-6">
                    <?php 
                        $sql = "SELECT * FROM inventory_types";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($type_row = $result->fetch_assoc()) {
                                $selected = ($type_row['type_name'] === $row['inventory_type']) ? 'selected' : '';
                                echo "<option value='{$type_row['type_name']}' $selected>{$type_row['type_name']}</option>";
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="form-row">
                <label for="inventoryId" class="col-md-6 bold-label">Inventory ID:</label>
                <div class="col-md-6"><?php echo $row['inventory_id']; ?></div>
            </div>
            <div class="form-row">
                <label for="brand" class="col-md-6 bold-label">Brand:</label>
                <div class="col-md-6">
                    <?php 
                        $sql = "SELECT * FROM brands";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($brand_row = $result->fetch_assoc()) {
                                $selected = ($brand_row['brand_name'] === $row['brand']) ? 'selected' : '';
                                echo "<option value='{$brand_row['brand_name']}' $selected>{$brand_row['brand_name']}</option>";
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="form-row">
                <label for="model" class="col-md-6 bold-label">Model:</label>
                <div class="col-md-6"><?php echo $row['model']; ?></div>
            </div>
            <div class="form-row">
                <label for="specification" class="col-md-6 bold-label">Specification/CPU:</label>
                <div class="col-md-6"><?php echo $row['specification']; ?></div>
            </div>
            <div class="form-row">
                <label for="ram" class="col-md-6 bold-label">RAM:</label>
                <div class="col-md-6"><?php echo $row['ram']; ?></div>
            </div>
            <div class="form-row">
                <label for="ssdHdd" class="col-md-6 bold-label">SSD/HDD:</label>
                <div class="col-md-6"><?php echo $row['ssd_hdd']; ?></div>
            </div>
            <div class="form-row">
                <label for="serviceTag" class="col-md-6 bold-label">Service Tag No.:</label>
                <div class="col-md-6"><?php echo $row['service_tag']; ?></div>
            </div>
            <div class="form-row">
                <label for="serialNumber" class="col-md-6 bold-label">Serial No.:</label>
                <div class="col-md-6"><?php echo $row['serial_number']; ?></div>
            </div>
            <div class="form-row">
                <label for="condition" class="col-md-6 bold-label">Condition:</label>
                <div class="col-md-6"><?php echo $row['condition_status']; ?></div>
            </div>
            <div class="form-row">
                <label for="commissioningDate" class="col-md-6 bold-label">Commissioning Date:</label>
                <div class="col-md-6"><?php echo $row['commissioning_date']; ?></div>
            </div>
            <div class="form-row">
                <label for="upgradingDate" class="col-md-6 bold-label">Upgrading/Repair Date:</label>
                <div class="col-md-6"><?php echo $row['upgrading_date']; ?></div>
            </div>
            <div class="form-row">
                <label for="handoverDate" class="col-md-6 bold-label">Handover Date:</label>
                <div class="col-md-6"><?php echo $row['handover_date']; ?></div>
            </div>
            <div class="form-row">
                <label for="remarks" class="col-md-6 bold-label">Remarks:</label>
                <div class="col-md-6"><?php echo $row['remarks']; ?></div>
            </div>
        </form>
    </div>
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript for form validation
        document.getElementById('inventoryForm').addEventListener('submit', function(event) {
            const form = event.target;

            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        });
    </script>
</body>
</html>
