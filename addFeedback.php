<html>
<head>
  <title>Feedback Form</title>
  <link rel="stylesheet" href="background.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="homepage.css"> -->

</head>
<body>
<a href="customer.php" style="color:red">Customer Home</a> <br><br>

  

 <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
  <div class="card card-signin my-5">
       <div class="card-body">
                            <h5 class="card-title text-center">Feedback Form</h5>
                            <!-- <p>Please fill in your credentials to login.</p>
                            <h2>Login</h2> -->
        <h3>Please add your feedback.</h3>
  

<form action="addFeedback2.php" method="get">
	<div class="form-group">

		<label for="productName">Feedback on products</label>
    	<input type="text" class="form-control" id="productName" aria-describedby="emailHelp" placeholder="Enter feedback about our products" name="productfeedback">
    

	</div>


	<div class="form-group">

		<label for="feedback">Feedback on staff and service:</label>
    	<input type="text" class="form-control" id="feedback" aria-describedby="emailHelp" placeholder="Enter Feedback about our staff and service" name="stafffeedback">


	</div>


		
	<button type="submit" class="btn btn-primary">Submit</button>

</form>

</div>
</div>
</div>
</div>
</div>

</body>
</html>