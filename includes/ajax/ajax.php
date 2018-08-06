<?php include '../init.php';
if(!empty($_POST['action'])) {
	// if($this->connect_error) {
	// 	exit(json_encode("Connect error"));
	// }
	if($_POST['action'] == 'mybooks') {
		if(!empty($_POST['user_id'])) {
			$user_id = $_POST['user_id'];
			$result = $getFromBook->borrowedBooks($user_id);
			
			if($result->num_rows === 0) {
				echo json_encode("You do not currently have any books!");
			} else {
				while($each_row = $result->fetch_assoc()) {
					$all_rows[] = $each_row;
				}
				echo json_encode($all_rows);
			}


		} else {
			echo json_encode("Error, don't know which user you are!");
		}
		
	} else {
		echo json_encode("Errors");
	}
}
	

?>