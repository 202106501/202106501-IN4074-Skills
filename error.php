<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Error</title>
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
                    <h2 class="mt-5 mb-3">Invalid Request</h2>
                    <div class="alert alert-danger">Sorry, you've made an invalid request. Please <a href="index.php" class="alert-link">go back</a> and try again.</div>
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