<?php include 'includes/init.php'; 

	if(isset($_POST['signup'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$error = "";
		if(empty($name) || empty($email) || empty($password)) {
			$error = "All fields are required";
		} else {
			$email = $getFromUser->checkInput($email);
			$password = $getFromUser->checkInput($password);
			$name = $getFromUser->checkInput($name);

			if(!filter_var($email)) {
				$error = 'Invalid email format';
			} elseif(strlen($name) > 30 || strlen($name) <= 3) {
				$error = "Name must be between 4-30 characters";
			} elseif(strlen($password) <= 4) {
				$error = "Password is too short, enter password that has at least 5 characters";
			} else {
				if($getFromUser->checkEmail($email) === true) {
					$error = "Email is already in use";
				} else {
					$getFromUser->register($email, $name, $password);
					// header('Location: home.php');
					
				}
			}
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
	    <form class="form-horizontal" role="form" method="POST" action="register.php">
	        <div class="row">
	            <div class="col-md-3"></div>
	            <div class="col-md-6">
	                <h2>Register New User</h2>
	                <hr>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-md-3 field-label-responsive">
	                <label for="name">Name</label>
	            </div>
	            <div class="col-md-6">
	                <div class="form-group">
	                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
	                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
	                        <input type="text" name="name" class="form-control" id="name"
	                               placeholder="John Doe" required autofocus>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-3">
	                <div class="form-control-feedback">
	                        <span class="text-danger align-middle">
	                            <!-- Put name validation error messages here -->
	                        </span>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-md-3 field-label-responsive">
	                <label for="email">E-Mail Address</label>
	            </div>
	            <div class="col-md-6">
	                <div class="form-group">
	                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
	                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
	                        <input type="text" name="email" class="form-control" id="email"
	                               placeholder="you@example.com" required autofocus>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-3">
	                <div class="form-control-feedback">
	                        <span class="text-danger align-middle">
	                            <!-- Put e-mail validation error messages here -->
	                        </span>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-md-3 field-label-responsive">
	                <label for="password">Password</label>
	            </div>
	            <div class="col-md-6">
	                <div class="form-group has-danger">
	                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
	                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
	                        <input type="password" name="password" class="form-control" id="password"
	                               placeholder="Password" required>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-3">
	                
	            </div>
	        </div>
	        <!-- <div class="row">
	            <div class="col-md-3 field-label-responsive">
	                <label for="password">Confirm Password</label>
	            </div>
	            <div class="col-md-6">
	                <div class="form-group">
	                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
	                        <div class="input-group-addon" style="width: 2.6rem">
	                            <i class="fa fa-repeat"></i>
	                        </div>
	                        <input type="password" name="password-confirmation" class="form-control"
	                               id="password-confirm" placeholder="Password" required>
	                    </div>
	                </div>
	            </div>
	        </div> -->
	        <div class="row">
	            <div class="col-md-3"></div>
	            <div class="col-md-6">
	            	<?php if(isset($error)) { echo 
	            		"<div class='form-control-feedback'>
		                        <span class='text-danger align-middle'>
		                            <i class='fa fa-close'>" . $error . "</i>
		                        </span>
		                </div>"; 
	         		}
	            ?>
	                <button type="submit" class="btn btn-success" name="signup"><i class="fa fa-user-plus"></i> Register</button>
	                 <a class="btn btn-link" href="index.php">Already have an account? Login here.</a>
	            </div>
	        </div>
	    </form>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>