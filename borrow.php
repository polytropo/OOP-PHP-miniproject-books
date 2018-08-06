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

if(isset($_POST['btnSelect'])) {
	$_SESSION['selectedOption'] = $_POST['select'];
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
	<div class="text-right p-4">
		<a href="logout.php" title="" class="btn btn-primary">Log Out</a>
	  <a href="home.php" title="Borrow A book" class="btn btn-primary">Return to overview of users</a>
	</div>
	<input type="" name="" hidden>
	<div class="form-group col-md-3 ">
		<form action="" method="post" accept-charset="utf-8">
			<label for="exampleFormControlSelect1">Show Selected:</label>
			<select class="form-control" id="exampleFormControlSelect1" name="select">
				<option value="AllBooks" default >All books</option>
				<!-- <option value="Borrowed">Borrowed Books</option> -->
				<option value="Available">Avaliable only</option>
				<!-- <option value="MyBooks">My Borrowed Books</option> -->
			</select>
			<button type="submit" name="btnSelect">Select</button>	
		</form>
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
		<tbody id="books">
			<?php if(!isset($_POST['select']) || $_POST['select'] === 'AllBooks'): ?>
			<form action="" method="post">
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
			<?php elseif(isset($_POST['btnSelect']) && ($_POST['select']) === "Available"): ?>
				<form action="" method="post">
				<?php $result = $getFromBook->showAvailableBooks();
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
					
					} else {
						echo "<td></td>";
					}
				echo "</tr>";
				}

				?>
		
			</form>
		<?php endif; ?>
		</tbody>
	</table>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>


	<script>
	
		// var one = document.getElementById("exampleFormControlSelect1");
		// console.log(one.value);
		// one.addEventListener("change", function() {
		// 	console.log(one.value);
		// });
		// $(document).ready(function(){
		// 	var one = document.getElementById("exampleFormControlSelect1");
		// 	one.addEventListener("change", function() {
		// 		$.ajax({
		// 			url: "includes/ajax/ajax.php",
		// 			method:'POST',
		// 			data: {
		// 				action: 'mybooks',
		// 				user_id: "<?php echo $user_id ?>"
		// 			}
		// 		})
		// 		.always(function(data) {
		// 			console.log("Testing");
		// 		})
		// 		.done(function(data) {
		// 			var result = JSON.parse(data);
		// 			document.getElementById("books").innerHTML = result;
					
		// 		})
		// 		.fail(function(data) {
		// 			console.log("failed");
		// 		});
		// 	});
		// });
	</script>
</body>
</html>