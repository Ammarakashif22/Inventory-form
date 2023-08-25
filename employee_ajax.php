<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Lookup</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Employee Lookup</h2>

        <div class="form-group">
            <label for="employeeId">Employee ID:</label>
            <input type="text" class="form-control" id="employeeId" placeholder="Enter Employee ID">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" id="lookupButton">Lookup Employee</button>
        </div>

        <div id="employeeInfo" class="mt-4"></div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="path-to-your-custom-js-file.js"></script>

    <script>
        $(document).ready(function() {
            $('#lookupButton').click(function() {
                var empId = $('#employeeId').val();
                
                $.ajax({
                    url: 'get_employee.php',
                    method: 'GET',
                    data: { empId: empId },
                    success: function(response) {
                        $('#employeeInfo').html(response);
                    },
                    error: function() {
                        $('#employeeInfo').html('<div class="alert alert-danger">Error retrieving employee information.</div>');
                    }
                });
            });
        });
    </script>
</body>
</html>
