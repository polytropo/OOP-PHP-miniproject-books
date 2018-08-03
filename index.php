<?php include 'includes/init.php';
	if(isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		if(!empty($email) || !empty($password)) {
			// run variables through filters
			$email = $getFromUser->checkInput($email);
			$password = $getFromUser->checkInput($password);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error = "Invalid format";
			} else {
				$getFromUser->login($email, $password);
				if($getFromUser->login($email, $password) == false) {
					$error="Incorrect login details";
				}
			}
		} else {
			$error = "Please enter username and password";
		} 
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="includes/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Please Login</h2>
                    <hr>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
	                <label for="email">E-Mail</label>
	            </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="email">E-Mail Address</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <input type="text" name="email" class="form-control" id="email"
                                   placeholder="you@example.com" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
	                <label for="password">Password</label>
	            </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="password">Password</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Password" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        <!-- Put password error message here -->    
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                	
                </div>
                <div class="col-md-6">
	            	<?php if(isset($error)) { echo 
	            		"<div class='form-control-feedback'>
		                        <span class='text-danger align-middle'>
		                            <i class='fa fa-close'>" . $error . "</i>
		                        </span>
		                </div>"; 
	         		}
	            ?>
                    <button type="submit" class="btn btn-success" name="login"><i class="fa fa-sign-in"></i> Login</button >
                    <a class="btn btn-link" href="register.php">Don't Have an account yet? Register here.</a>
                </div>
            </div>
        </form>
    </div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>