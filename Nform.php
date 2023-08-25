<?php 

Include 'formhandling.php';
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Register Form</title>
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
        <div class="row mb-3">
            <div class="col-md-6">
                <h2 class="mb-0">Inventory Form</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="view.php" class="btn btn-primary">View</a>
            </div>
        </div>
        <form id="inventoryForm" action="Nform.php" method="POST">
            <div class="form-row">
                 <div class="form-group col-md-6">
                    <label for="section">Emp ID</label>
                    <input type="text" class="form-control" id="empId" name="empId" maxlength="20"  autocomplete="off" required>
                </div>
                 <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" maxlength="50" autocomplete="off" required>
                </div>
            </div>
            <div class="form-row">
                 <div class="form-group col-md-6">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" maxlength="50" autocomplete="off" required>
                </div>
                 <div class="form-group col-md-6">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" id="department" name="department" maxlength="20" autocomplete="off" required>
                </div>
            
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" maxlength="20" autocomplete="off" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="empId">Institute</label>
                    <input type="text" class="form-control" id="institute" name="institute" maxlength="20" autocomplete="off" required>
                </div>
               
                
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="section">Section & Subsection</label>
                    <input type="text" class="form-control" id="section" name="section" maxlength="20" autocomplete="off" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inventoryType">Inventory Type</label>
                    <select class="form-control" id="inventoryType" name="inventoryType" required>
                        <option value="">Select Type</option>
<?php 
 $sql = "SELECT * FROM inventory_types";
                $result = $conn->query($sql);

                // Display data in the table rows
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        
                    
                        <option value="<?php echo $row['type_name']; ?>"><?php echo $row['type_name']; ?></option>


<?php  } } ?>


                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inventoryId">Inventory ID</label>
                    <input class="form-control" id="inventoryId" name="inventoryId" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="brand">Brand</label>
                    <select class="form-control" id="brand" name="brand" required>
                        <option value="">Select Brand</option>
                 <?php 
 $sql = "SELECT * FROM brands";
                $result = $conn->query($sql);

                // Display data in the table rows
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        
                    
                        <option value="<?php echo $row['brand_name']; ?>"><?php echo $row['brand_name']; ?></option>


<?php  } } ?>

                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="model">Model</label>
                    <input type="text" class="form-control" id="model" name="model" maxlength="20" autocomplete="off" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="specification">Specification/CPU</label>
                    <input type="text" class="form-control" id="specification" name="specification" maxlength="20" autocomplete="off" required>
                </div>
            </div>
            <div class="form-row">
    <div class="form-group col-md-4">
        <label for="ram">RAM</label>
        <input type="text" class="form-control" id="ram" name="ram" maxlength="20" autocomplete="off" required>
    </div>
    <div class="form-group col-md-4">
                    <label for="ssdHdd">SSD/HDD</label>
                    <input type="text" class="form-control" id="ssdHdd" name="ssdHdd" maxlength="20" autocomplete="off" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="serviceTag">Service Tag No.</label>
                    <input type="text" class="form-control" id="serviceTag" name="serviceTag" maxlength="20" autocomplete="off" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="serialNumber">Serial No.</label>
                    <input type="text" class="form-control" id="serialNumber" name="serialNumber" maxlength="20" autocomplete="off" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="condition">Condition</label>
                    <input type="text" class="form-control" id="condition" name="condition" maxlength="20" autocomplete="off" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="commissioningDate">Commissioning Date</label>
                    <input type="date" class="form-control" id="commissioningDate" name="commissioningDate" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="upgradingDate">Upgrading/Repair Date</label>
                    <input type="date" class="form-control" id="upgradingDate" name="upgradingDate">
                </div>
                <div class="form-group col-md-4">
                    <label for="handoverDate">Handover Date</label>
                    <input type="date" class="form-control" id="handoverDate" name="handoverDate">
                </div>
                <div class="form-group col-md-4">
                    <label for="remarks">Remarks</label>
                    <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>


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