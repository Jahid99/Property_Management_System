<?php 
include 'lib/Session.php';
?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>
<?php 
        $db = new Database();
        $fm = new Format();     
 ?>
 <?php
        if(isset($_GET['action']) && isset($_GET['action'])=="logout"){
            Session::destroy();
        }
        if(isset($_SESSION['username']) && $_SESSION['username']=='adminsays'){
        echo "<script>window.location='admin/'</script>";
        exit;
      }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Property Management System</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>


<nav class="navbar navbar-expand-sm navbar-light bg-faded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Brand -->
    <a class="navbar-brand" href="#">Property Management System</a>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="nav-content">   
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Link 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 3</a>
            </li>
        </ul>
    </div>
</nav>