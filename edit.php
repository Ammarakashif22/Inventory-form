<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventory</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Additional custom styles */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        label {
        font-weight: bold;
    }
    </style>
</head>
<body>

    <div class="container mt-5">
    <h2 class="mb-0">Edit Inventory Details</h2>
           <div class="row-mb-3">
            <div class="col-md-12 text-right">
            <a href="Nform.php" class="btn btn-secondary ml-2">New Form</a>
             <a href="view.php" class="btn btn-primary ml-2">View</a>
        </div>
    </div>
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

        if (isset($_GET['id'])) {
            $item_id = $_GET['id'];
            // Query the database to get the details for this item
            $sql = "SELECT * FROM inventory WHERE id = $item_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                echo "<form method='post' action='update.php' id='inventoryForm'>";
                echo "<input type='hidden' name='item_id' value='$item_id'>";

                
                echo "<div class='form-row'>";
                echo "<div class='form-group col-md-6'>";
                echo "<label for='emp_id'>Emp ID</label>";
                echo "<input type='text' class='form-control' id='emp_id' name='emp_id' value='" . $row['emp_id'] . "' maxlength='20' autocomplete='off' required>";
                echo "</div>";
                echo "<div class='form-group col-md-6'>";
                echo "<label for='name'>Name</label>";
                echo "<input type='text' class='form-control' id='name' name='name' value='" . $row['name'] . "' maxlength='50' autocomplete='off' required>";
                echo "</div>";
                echo "</div>";

echo "<div class='form-row'>";
echo "<div class='form-group col-md-6'>";
echo "<label for='designation'>Designation</label>";
echo "<input type='text' class='form-control' id='designation' name='designation' value='" . $row['designation'] . "' maxlength='50' autocomplete='off' required>";
echo "</div>";
echo "<div class='form-group col-md-6'>";
echo "<label for='department'>Department</label>";
echo "<input type='text' class='form-control' id='department' name='department' value='" . $row['department'] . "' maxlength='20' autocomplete='off' required>";
echo "</div>";
echo "</div>";

echo "<div class='form-row'>";
echo "<div class='form-group col-md-6'>";
echo "<label for='location'>Location</label>";
echo "<input type='text' class='form-control' id='location' name='location' value='" . $row['location'] . "' maxlength='20' autocomplete='off' required>";
echo "</div>";
echo "<div class='form-group col-md-6'>";
echo "<label for='institute'>Institute</label>";
echo "<input type='text' class='form-control' id='institute' name='institute' value='" . $row['institute'] . "' maxlength='20' autocomplete='off' required>";
echo "</div>";
echo "</div>";

echo "<div class='form-row'>";
echo "<div class='form-group col-md-6'>";
echo "<label for='section'>Section & Subsection</label>";
echo "<input type='text' class='form-control' id='section' name='section' value='" . $row['section'] . "' maxlength='20' autocomplete='off' required>";
echo "</div>";
echo "<div class='form-group col-md-6'>";
echo "<label for='inventory_type'>Inventory Type</label>";
echo "<input type='text' class='form-control' id='inventory_type' name='inventory_type' value='" . $row['inventory_type'] . "' maxlength='50' autocomplete='off' required>";
echo "</div>";
echo "</div>";

echo "<div class='form-row'>";
echo "<div class='form-group col-md-6'>";
echo "<label for='inventory_id'>Inventory ID</label>";
echo "<input type='text' class='form-control' id='inventory_id' name='inventory_id' value='" . $row['inventory_id'] . "' maxlength='20' autocomplete='off' required>";
echo "</div>";
echo "<div class='form-group col-md-6'>";
echo "<label for='brand'>Brand</label>";
echo "<input type='text' class='form-control' id='brand' name='brand' value='" . $row['brand'] . "' maxlength='20' autocomplete='off' required>";
echo "</div>";
echo "</div>";

echo "<div class='form-row'>";
echo "<div class='form-group col-md-6'>";
echo "<label for='model'>Model</label>";
echo "<input type='text' class='form-control' id='model' name='model' value='" . $row['model'] . "' maxlength='20' autocomplete='off' required>";
echo "</div>";
echo "<div class='form-group col-md-6'>";
echo "<label for='specification'>Specification/CPU</label>";
echo "<input type='text' class='form-control' id='specification' name='specification' value='" . $row['specification'] . "' maxlength='20' autocomplete='off' required>";
echo "</div>";
echo "</div>";

echo "<div class='form-row'>";
echo "<div class='form-group col-md-4'>";
echo "<label for='ram'>RAM</label>";
echo "<input type='text' class='form-control' id='ram' name='ram' value='" . $row['ram'] . "' maxlength='20' autocomplete='off' required>";
echo "</div>";
echo "<div class='form-group col-md-4'>";
echo "<label for='ssd_hdd'>SSD/HDD</label>";
echo "<input type='text' class='form-control' id='ssd_hdd' name='ssd_hdd' value='" . $row['ssd_hdd'] . "' maxlength='20' autocomplete='off' required>";
echo "</div>";
echo "<div class='form-group col-md-4'>";
echo "<label for='service_tag'>Service Tag No.</label>";
echo "<input type='text' class='form-control' id='service_tag' name='service_tag' value='" . $row['service_tag'] . "' maxlength='20' autocomplete='off' required>";
echo "</div>";
echo "</div>";

echo "<div class='form-row'>";
echo "<div class='form-group col-md-4'>";
echo "<label for='serial_number'>Serial No.</label>";
echo "<input type='text' class='form-control' id='serial_number' name='serial_number' value='" . $row['serial_number'] . "' maxlength='20' autocomplete='off' required>";
echo "</div>";
echo "<div class='form-group col-md-4'>";
echo "<label for='condition_status'>Condition</label>";
echo "<input type='text' class='form-control' id='condition_status' name='condition_status' value='" . $row['condition_status'] . "' maxlength='20' autocomplete='off' required>";
echo "</div>";
echo "<div class='form-group col-md-4'>";
echo "<label for='commissioning_date'>Commissioning Date</label>";
echo "<input type='date' class='form-control' id='commissioning_date' name='commissioning_date' value='" . $row['commissioning_date'] . "' required>";
echo "</div>";
echo "</div>";

echo "<div class='form-row'>";
echo "<div class='form-group col-md-4'>";
echo "<label for='upgrading_date'>Upgrading/Repair Date</label>";
echo "<input type='date' class='form-control' id='upgrading_date' name='upgrading_date' value='" . $row['upgrading_date'] . "'>";
echo "</div>";
echo "<div class='form-group col-md-4'>";
echo "<label for='handover_date'>Handover Date</label>";
echo "<input type='date' class='form-control' id='handover_date' name='handover_date' value='" . $row['handover_date'] . "'>";
echo "</div>";
echo "<div class='form-group col-md-4'>";
echo "<label for='remarks'>Remarks</label>";
echo "<textarea class='form-control' id='remarks' name='remarks' rows='3'>" . $row['remarks'] . "</textarea>";
echo "</div>";
echo "</div>";



              

                // Add the Update button
                echo "<div class='form-row justify-content-center'>";
                echo "<div class='form-group col-md-6'>";
                echo "<button type='submit' class='btn btn-primary btn-block'>Update</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            } else {
                echo "Item not found.";
            }
        } else {
            echo "Item ID not provided.";
        }

        $conn->close();
        ?>
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
