<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Inventory</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    
         .container {
            max-width: 1000px; 
            padding: 20px;
        }
        .table-responsive {
            overflow-x: auto;
        }
        
       
    </style>
</head>
<body>
    <div class="container mt-5" style="margin-left:20%;">
        <h2 class="mb-4 d-inline-block">View Inventory</h2>

        <!-- Buttons -->
        <div class="mb-3 d-inline-block ml-3">
            <a href="Nform.php" class="btn btn-secondary ml-2">New Form</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Location</th>
                    <th>Department/Institute</th>
                    <th>Section & Subsection</th>
                    <th>Emp ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                </tr>
            </thead>
            <tbody>
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

                // Query to fetch data from the inventory table
                $sql = "SELECT * FROM inventory";
                $result = $conn->query($sql);

                // Display data in the table rows
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['location'] . "</td>";
                        echo "<td>" . $row['department'] . "</td>";
                        echo "<td>" . $row['section'] . "</td>";
                        echo "<td>" . $row['emp_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['designation'] . "</td>";
                        echo "<td><a href='view_more.php?id=" . $row['id'] . "' class='btn btn-primary'>View</a></td>";
                        echo "<td><a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
