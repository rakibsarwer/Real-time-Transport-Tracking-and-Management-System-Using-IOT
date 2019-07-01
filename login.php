<?php 
require_once 'php_action/db_connect.php';

session_start();

if(isset($_SESSION['adminName'])) {
	header('location: login.php');
}

$errors = array();

if($_POST) {		

	// escape variables for security
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	
	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Username is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $connection->query($sql);

		if($result->num_rows == 1) {
			
			// exists
			$mainSql = "SELECT * FROM users WHERE username = '$username' ";
			$mainResult = $connection->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['user_id'];
				$hash = $value['password'];
				if (password_verify($password, $hash)) {
					
				// set session
				$_SESSION['adminName'] = $username;
				$_SESSION['adminId'] = $user_id;

				header('location: index.php');
				}	
			} else{
				
				$errors[] = "Incorrect username/password combination";
			} // /else
		} else {		
			$errors[] = "Incorrect username/password combination";		
		} // /else
	} // /else not empty username // password
	
} // /if $_POST
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MyBlog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <link rel="stylesheet" href="custom/index_style.css">
  <script src="custom/validate.js"></script>

</head>
<body>
<div class="container">    
         <div id="" class=" col-md-4"> </div>
    <div id="" class=" col-md-4"> 
        
        <div class="row">                
            <div class="iconmelon">
              <svg viewBox="0 0 10 10">
                <g filter="">
                  <use xlink:href="#facebook"></use>
                </g>
              </svg>
            </div>
        </div>
        
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">Please Sign in</div>
            </div>     

            <div class="panel-body" >

                <form name="form" id="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form-horizontal" enctype="multipart/form-data" method="POST">
                   
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="user" type="text" class="form-control" name="username" value="" placeholder="User">                                        
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>                                                                  

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Log in</button>                          
                        </div>
                    </div>

                </form>     
	
	 	<div class="messages" style="text-align:center">
			<?php if($errors) {
				foreach ($errors as $key => $value) {
					echo '<div class="alert alert-danger" role="alert">
					<i class="glyphicon glyphicon-exclamation-sign"></i>
					'.$value.'</div>';										
				}
			} 
			?>
		</div>	
            </div>   

        </div>  
        <div class="" style="text-align:center">
		
		</div>	
    </div>
	 <div id="" class=" col-md-4"> </div>
	
   	
</div>

<div id="particles"></div>

<?php include('custom/svg.php'); ?>

</body>
</html>

