
<html>
    <head>
            
    </head>
    <body>
        <form action="#" method="GET">
            <input type="text" id="fname" name="fname" value=""><br>
            <input type="submit" value="ok">
            <!-- <button onclick="myFunction()">Click me</button> -->
            
        </form>
        

        

    </body>
</html>
<?php

if(!empty($_GET)){
    require('connect.php');
    $fname=$_GET['fname'];
    $sql="select age from names where fname='$fname'";
    $result=mysqli_query($db,$sql);
    $oneresult = $result->fetch_object();
    $age=$oneresult->age;
     echo  "my age is". $age;

}
            
        ?>

