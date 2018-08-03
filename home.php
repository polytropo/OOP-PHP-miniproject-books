<?php include 'includes/init.php';
	if(!isset($_SESSION['id'])) {
		header('Location: index.php');
	} 
	$user_id = $_SESSION['id'];
	// echo $user_id;
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Page </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- <link rel="stylesheet" type="text/css" href="includes/style.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>
	
	  <h2>All users</h2>
	  <p>Table display all currently registered users</p>
	  <a href="logout.php" title="" class="btn btn-primary">Log Out</a>
	  <a href="borrow.php" title="Borrow A book" class="btn btn-primary">Borrow A Book</a>
	  <table class="table table-striped">
	    <thead>
	      <tr>
	        <th>Id</th>
	        <th>Name</th>
	        <th>Email</th>
	      </tr>
	    </thead>
	    <tbody>
	    	
			
	    	<?php $result = $getFromUser->showUsers();
	    	while($each_user = $result->fetch_assoc()) {
				echo " <tr>
			        		<td>". $each_user['id'] . "</td>
			        		<td>". $each_user['name'] . "</td>
			        		<td>". $each_user['email'] . "</td>
			     		 </tr>";
			}
			
	    	
	    		
	    	?>
	      
	      
	    </tbody>
	  </table>
	

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>