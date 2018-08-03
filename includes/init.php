<?php  
	// Include db, and all classes, order matters
	include 'connection.php';
	include 'classes/User.php';
	include 'classes/Book.php';
	
	// Include global connection
	global $conn;
	// start a session
	session_start();

	// Instantiate new classes, pass in required variables bcs of construct method
	$getFromUser = new User($conn);
	$getFromBook = new Book($conn);


	
	
?>