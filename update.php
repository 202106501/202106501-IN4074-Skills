<?php
// Include config file
require_once "config.php"; 

// Define variables and initialize with empty values
$project_name = $description = $status = $technologies_used = "";
$project_name_err = $description_err = $status_err = $technologies_used_err = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

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
        $description = $input_description;
    }

    // Validate status
    $input_status = trim($_POST["status"]);
    if (empty($input_status)) {
        $status_err = "Please enter a status.";
    } else {
        $status = $input_status;
    }

    // Validate Technologies used
    $input_technologies_used = trim($_POST["technologies_used"]);
    if (empty($input_technologies_used)) {
        $technologies_used_err = "Please enter the Technologies used.";
    } else {
        $technologies_used = $input_technologies_used;
    }

    // Check input errors before inserting in database
    if (empty($project_name_err) && empty($description_err) && empty($status_err) && empty($technologies_used_err)) {
        // Prepare an update statement
$sql = "UPDATE projects SET project_name=?, description=?, status=?, technologies_used=? WHERE id=?";

if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssssi", $param_project_name, $param_description, $param_status, $param_technologies_used, $param_id);

    // Set parameters
    $param_project_name = $project_name;
    $param_description = $description;
    $param_status = $status;
    $param_technologies_used = $technologies_used;
    $param_id = $id;

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Records updated successfully. Redirect to landing page
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
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM projects WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $project_name = $row["project_name"];
                    $description = $row["description"];
                    $status = $row["status"];
                    $technologies_used = $row["technologies_used"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <project_name>Update Record</project_name>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <!-- Navigation Section -->
  <nav>
  <ul>
    <li><a href="index.php">Home</a></li>
      <li><a href="create.php">Add Record</a></li>
      <li><a href="#portfolio">Portfolio</a></li>
      <li><a href="#resume">Resume</a></li>
      <li><a href="#contact">Contact</a></li>
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
  padding: 14px;
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
  padding: 20px 50px;
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the projects Record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                            <label>project_name</label>
                            <input type="text" name="project_name" class="form-control <?php echo (!empty($project_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $project_name; ?>">
                            <span class="invalid-feedback"><?php echo $project_name_err; ?></span>
                        </div>   
                    <div class="form-group">
                            <label>description</label>
                            <input type="text" name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $description; ?>">
                            <span class="invalid-feedback"><?php echo $description_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>status</label>
                            <input type="text" name="status" class="form-control <?php echo (!empty($status_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $status; ?>">
                            <span class="invalid-feedback"><?php echo $status_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Publication date</label>
                            <input type="text" name="technologies_used" class="form-control <?php echo (!empty($technologies_used_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $technologies_used; ?>">
                            <span class="invalid-feedback"><?php echo $technologies_used_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>