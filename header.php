<?php
    $WEBSITE_NAME="Singhe Super";
    if(!isset($PAGE_NAME))
        $PAGE_NAME = "New page";
    
    if(!isset($USER_NAME)){
        $USER_NAME="Guest"
    }

    $line = "<html>";echo $line;
    $line ="<title>$WEBSITE_NAME : $PAGE_NAME</title>";echo $line;
    $line ="<body>";echo $line;
    $line ="<head>";echo $line;
?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bootstrap 4 Nav Vertical Alignment</title>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../fontawesome/css/fontawesome.css">
  <link rel="stylesheet" a href="SearchProduct.css">
  <script src="../jquery/jquery-3.5.1.js"></script>
  <script src="../popper-core/src/popper.js"></script>
  <script src="../bootstrap/dist/js/bootstrap.js"></script>

<?php
    $line = "</body>";echo $line;
    $line = "<p>Hi! $USER_NAME, welcome to $WEBSITE_NAME : $PAGE_NAME"; echo $linel;
    $line = "<hr>"; echo $line; 
?>