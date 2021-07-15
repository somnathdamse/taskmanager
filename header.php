<?php
session_start();

include ("dbconn/DatabaseConnection.php");
$dbsql= new DatabaseConnection();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Task Manager  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="css/sweetalert.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar">LLL</span>
        <span class="icon-bar">L</span>
        <span class="icon-bar">L</span>                        
      </button>
      <a class="navbar-brand"><?php if (!isset($_SESSION['id'])) {?>Task Manager<?php }
      else{ echo "Welcome ".$_SESSION['username']; } ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" id="mylist">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="tasks.php">Tasks</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <?php if (!isset($_SESSION['status'])){ ?>
        <li><a href="career.php">Career</a></li>
          <li><a href="resume.php">Check resumes</a></li>
        <?php } else { ?>

        <?php  }?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['username'])){ ?>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
            <!-- </ul> -->
          <!-- <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li> -->
        <?php }else{ ?>
         <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<!-- <div class="container">
  <h3>Navbar bootstrap</h3>
  <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).
  <p>Only when the button is clicked, the navigation bar will be displayed.</p>
</div> -->
