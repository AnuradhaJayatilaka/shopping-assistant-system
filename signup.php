
<!DOCTYPE html>
<html>
<head>
    <title>
        User Registration
    </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div>
    
        <?php
        require_once('mysqlconnect.php');
        // if(isset($_POST["create"])){
        //     $user_name = $_POST['user_name'];
        //     $email_address = $_POST['email_address'];
        //     $mobile_number = $_POST['mobile_number'];
        //     $user_type = $_POST['user_type'];
        //     $title = $_POST['title'];
        //     $NIC = $_POST['NIC'];
        //     $password = $_POST['password'];
        //     $sql = "INSERT INTO users(`email_address`, `user_name`, `NIC`, `user_type`, `mobile_number`, `title`, `password` )VALUES(?, ?, ?, ?, ?, ?, ?)";
        //     $stmtinsert = $db->prepare($sql);
        //     $result = $stmtinsert->execute([ $email_address, $user_name, $NIC,$user_type,  $mobile_number, $title, $password]);
        //     if($result){
        //         echo 'Successfully saved';
        //     }
        //     else{
        //         echo 'there were errors';
        //     }
        // }
        ?>
    </div>

    <div>
        <form action="signup.php" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h1>Sign Up</h1>
                        <p>Fill up all the fields</p>
                        <hr class= "mb-3">
                        <label for="user_name"><b>User Name</b></label>
                        <input class="form-control" type="text" id="user_name" name="user_name" requiered>

                        <label for="email_address"><b>E-mail Address</b></label>
                        <input class="form-control" type="email" id="email_address" name="email_address" requiered>

                        <label for="NIC"><b>NIC</b></label>
                        <input class="form-control" type="text" id="NIC" name="NIC" requiered>

                        <label for="user_type"><b>User Type</b></label>
                        <input class="form-control" type="text" id="user_type" name="user_type" requiered>

                        <label for="mobile_number"><b>Mobile Number</b></label>
                        <input class="form-control" type="text" id="mobile_number" name="mobile_number" requiered>

                        <label for="title"><b>Title</b></label>
                        <input class="form-control" type="text" id="title" name="title" requiered>

                        <label for="password"><b>Password</b></label>
                        <input class="form-control" type="password" id="password" name="password" requiered>
                        <hr class= "mb-3">
                        <input class="btn btn-primary" type= "submit" id="create" name="create" value="Sign Up">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type= "text/javascript">
        $(function(){
            $('#create').click(function(e){

                 var valid= this.form();
                if(!valid.checkValidity){

            var user_name = $('#user_name').val();
               var email_address = $('#email_address').val();
               var NIC = $('#NIC').val();
               var user_type = $('#user_type').val();
               var mobile_number = $('#mobile_number').val();
               var title = $('#title').val();
               var password = $('#password').val();
                    e.preventDefault();

                    
                   
                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: {user_name: user_name, email_address: email_address, NIC: NIC, user_type: user_type, mobile_number: mobile_number, title: title, password: password},
                        success: function(data){
                            Swal.fire({
                                title: 'successful',
                                text: data,
                                type:- 'success'
                            })
                             },
                        error: function(data){
                            Swal.fire({
                                title: 'errors',
                                text: 'errors while saving data',
                                type:- 'error'
                            })
                        }             
                    });
                
                    }
                else{
                
                }

               
            });
            
            
        });
        </script>
</body>
</html>