<?php
require('mysqlconnect.php');
// include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="background.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="form">
<p>Welcome to Dashboard.</p>
<p><a href="AdministratorHomepage.php">Home</a><p>
<p><a href="insert.php">Insert New Record</a></p>
<p><a href="view.php">View Records</a><p>
<p><a href="logout.php">Logout</a></p>
</div>
</body>
</html>