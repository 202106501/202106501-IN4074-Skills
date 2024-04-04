<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Navigation Section -->
    <nav>
    <ul>
    <li><a href="demo.php">Database</a></li>
    <li><a href="index.php">Home</a></li>
      <li><a href="#resources">Resources</a></li>
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

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="hero-section" id="home">
        <h1>Welcome to the Junior Code World! 🐞💻</h1>
       
        <img src="img/img2.jpg" alt="" srcset="">
    </div>


    <div class="section" id="resources">
    <h2>Citations</h2>
        <p>Here are the citations in APA format of those websites which I have used to get information about creating my own webpage.</p>
        <h2>REFRENCES AND RESOURCES</h2>
        <p>DeFelice, K. (n.d.). How to make a portfolio. Canva. Retrieved April 4, 2024, from <a href=" https://www.canva.com/learn/portfolio/"> Portfolio</a></p>
<p>How to create a portfolio. (n.d.). W3Schools. Retrieved April 4, 2024, from <a href="https://www.w3schools.com/howto/howto_website_create_portfolio.asp">Portfolio</a></p>
<p>Levine, N. (n.d.). How to Create a Simple Web Page with HTML: 9 Steps (with Pictures). wikiHow. Retrieved April 4, 2024, from <a href=" https://www.wikihow.com/Create-a-Simple-Web-Page-with-HTML">Web Page</a></p>
<p>SQL CREATE DATABASE Statement. (n.d.). W3Schools. Retrieved April 4, 2024, from <a href="https://www.w3schools.com/SQl/sql_create_db.asp">Database</a></p>
    </div>
    
    <div class="section" id="resume">
        <h5>Here are the my porjects</h5>
        <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, soluta inventore expedita officiis, animi placeat nostrum cupiditate laborum alias dolore qui harum repellat excepturi earum aperiam eveniet nulla iure numquam?</h2>
        <p></p>
    </div>
   

    <div class="section" id="me">
        
        <div class="container">
            <div class="form-container">
                <h1>Contact Us</h1>
                <form action="submit.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required><br><br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br><br>
                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message" rows="4" required></textarea><br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
            <div class="text-container">
            <img src="img2.jpg" alt="Your Image Description" width="400" height="450">
<p>My name is Jasveer Singh and student ID: 202106501</p>
            </div>
        </div>

</body>
</html>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Projects Record</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Record</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution 
                    $sql = "SELECT * FROM projects";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>id</th>";
                            echo "<th>project_name</th>";
                            echo "<th>description</th>";
                            echo "<th>status</th>";
                            echo "<th>technologies_used</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['project_name'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>";
                                echo "<td>" . $row['technologies_used'] . "</td>";
                                echo "<td>";
                                echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3" project_name="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" project_name="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="delete.php?id=' . $row['id'] . '" project_name="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No Record were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
  <!-- Footer Section -->
  <footer>
     <p>&copy;  All Rights Reserved by Jasveer Singh 202106501.</p>
    </footer>
</html>