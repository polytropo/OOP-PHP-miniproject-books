<?php include 'includes/init.php';

if(!isset($_SESSION['id'])) {
	header('Location: index.php');
} 
$user_id = $_SESSION['id'];

if(isset($_POST['borrow'])) {
	$book_id = $_POST['borrow'];
	$getFromBook->borrowBook($user_id, $book_id);	
}

if(isset($_POST['return'])) {
	$book_return_id = $_POST['return'];
	$getFromBook->returnBook($book_return_id);	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<head>
	<meta charset="UTF-8">
	<title>Borrow A Book</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- <link rel="stylesheet" type="text/css" href="includes/style.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
</head>
<body>
	<div class="form-group col-md-3 ">
		<label for="exampleFormControlSelect1">Show Selected:</label>
		<select class="form-control" id="exampleFormControlSelect1">
			<option value="AllBooks" default>All books</option>
			<option value="Borrowed">Borrowed Books</option>
			<option value="Available">Avaliable only</option>
			<option value="MyBooks">My Books</option>
		</select>
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th></th>
				<th>Book Id</th>
				<th>Status</th>
				<th>Book Title</th>
				<th>Number of Pages</th>
				<th>Borrow/Return</th>
			</tr>
		</thead>
		<tbody>

			<form action="" method="post" >
				<?php $result = $getFromBook->showAllBoooks();
				while($each_book = $result->fetch_assoc()) {
					$user_id_book = $each_book['user_id'];
					$each_book['user_id'] == "" ? $each_book['user_id'] = "Available" : $each_book['user_id'] = "Borrowed";
					
				echo " <tr>
				<td><img src=". $each_book['book_image'] . "></td>
				<td>". $each_book['book_id'] . "</td>
				<td>". $each_book['user_id'] . "</td>
				<td>". $each_book['book_name'] . "</td>
				<td>". $each_book['book_pages'] . "</td>";
				
					if($each_book['user_id'] == "Available") {
						echo "<td><button class='btn btn-success' type='submit' name='borrow' value='". $each_book['book_id'] . "'>Borrow Now</button></td>";
					} elseif ($each_book['user_id'] == "Borrowed" && $user_id_book == $user_id) {
						echo "<td><button class='btn btn-danger' type='submit' name='return' value='". $each_book['book_id'] . "'>Return Now</button></td>";
					} else {
						echo "<td></td>";
					}
				echo "</tr>";
				}

				?>
		
			</form>

		</tbody>
	</table>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>

		var one = document.getElementById("exampleFormControlSelect1");
		console.log(one.value);
		one.addEventListener("change", function() {
			console.log(one.value);
		})
	</script>
</body>
</html>