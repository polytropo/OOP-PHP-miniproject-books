<?php
class Book {
	protected $conn;

	function __construct($conn) {
		$this->conn = $conn;
	}
	
	public function showAllBoooks() {
		$sql = "SELECT book_id, user_id, book_name, book_pages, book_image FROM books ";
		$result = $this->conn->query($sql);
		if($result->num_rows === 0) {
			echo "No Row retrieved";
		} else {
			return $result;
		}
	}

	public function showAvailableBooks() {
		$sql = "SELECT book_id, user_id, book_name, book_pages, book_image FROM books WHERE user_id IS NULL";
		$result = $this->conn->query($sql);
		if($result->num_rows === 0) {
			echo "No Row retrieved";
		} else {
			return $result;
		}
	}

	public function borrowBook($user_id, $book_id) {
		$sql = "UPDATE books SET user_id = '$user_id' WHERE book_id = $book_id ";
		$result = $this->conn->query($sql);
		if(!$result) {
			echo "Borrow book Query failed";
		} else {
			return true;
		}
	}

	public function returnBook($book_id) {
		$sql = "UPDATE books SET user_id = NULL WHERE book_id = '$book_id' ";
		$result = $this->conn->query($sql);
		if(!$result) {
			echo "Return book query error";
		} else {
			return true;
		}
	}
	
	public function borrowedBooks($user_id) {
		$sql = "SELECT * FROM books WHERE user_id = '$user_id' ";
		$result = $this->conn->query($sql);
		if(!$result) {
			echo "Querry borrowed books error";
		} else {
			return $result;
		}
	}
}

?>