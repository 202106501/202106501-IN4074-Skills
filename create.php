<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$project_name = $description = $status = $technologies_used = "";
$project_name_err = $description_err = $status_err = $technologies_used_err = "";

// Processing form data when form is submitted  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Validate project_name
    $input_project_name = trim($_POST["project_name"]);
    if (empty($input_project_name)) {
        $project_name_err = "Please enter the Project name.";
    } else {
        $project_name = $input_project_name;
    }

    // Validate description
    $input_description = trim($_POST["description"]);
    if (empty($input_description)) {
        $description_err = "Please enter the description.";
    } else {
        $description = $input_description; // Fixed variable assignment
    }

    // Validate status
    $input_status = trim($_POST["status"]); // Corrected form field name
    if (empty($input_status)) {
        $status_err = "Please enter status.";
    } else {
        $status = $input_status;
    }

    // Validate Technologies used
    $input_technologies_used = trim($_POST["technologies_used"]);
    if (empty($input_technologies_used)) {
        $technologies_used_err = "Please enter the technologies used.";
    } else {
        $technologies_used = $input_technologies_used;
    }

    // Check input errors before inserting in database
    if (empty($project_name_err) && empty($description_err) && empty($status_err) && empty($technologies_used_err)) { // Fixed condition
        // Prepare an insert statement
        $sql = "INSERT INTO projects (project_name, description, status, technologies_used) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_project_name, $param_description, $param_status, $param_technologies_used); // Fixed parameter types

            // Set parameters
            $param_project_name = $project_name;
            $param_description = $description;
            $param_status = $status;
            $param_technologies_used = $technologies_used;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <project_name>Create Record</project_name>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <!-- Navigation Section -->
   <nav>
    <ul>
    <li><a href="demo.php">Database</a></li>
    <li><a href="index.php">Home</a></li>
      <li><a href="#portfolio">Portfolio</a></li>
      <li><a href="#resume">Resume</a></li>
      <li><a href="#me">About me</a></li>
      <li><a href="create.php">Add Record</a></li>
    </ul>
  </nav>
   <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
        ul {
	list-style-type: circle;
  margin: 10px;
  padding: 10px;
  overflow: hidden;
  background-color: #BE9184;
  font-size: 35px;
  font-weight: bold;
  border-style: solid;
  border-color:#570A0A;
}

li {
  float: left;
}

li a {
  display: block;
  color: #420F01;
  text-align: center;
  font-style: italic;
  padding: 20px 40px;
   text-decoration: oblique;
}

li a:hover:not(.active) {
  background-color: #A76F64;
}

.active {
  background-color: #04AA6D;
}   
   </style>
     
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add projects Record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>project_name</label>
                            <input type="text" name="project_name" class="form-control <?php echo (!empty($project_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $project_name; ?>">
                            <span class="invalid-feedback"><?php echo $project_name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>description</label>
                            <input type="text" name="project_name" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $description; ?>">
                            <span class="invalid-feedback"><?php echo $description_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>status</label>
                            <input type="text" name="status" class="form-control <?php echo (!empty($status_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $status; ?>">
                            <span class="invalid-feedback"><?php echo $status_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Publication Date</label>
                            <input type="text" name="technologies_used" class="form-control <?php echo (!empty($technologies_used_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $technologies_used; ?>">
                            <span class="invalid-feedback"><?php echo $technologies_used_err; ?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
 <!-- Footer Section -->
 <footer>
     <p>&copy;  All Rights Reserved by Jasveer Singh 202106501.</p>
    </footer>
</html>