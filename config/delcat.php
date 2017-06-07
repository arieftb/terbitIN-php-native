<?php
	include 'connection.php';

	if (isset($_GET['id'])) {
		
		$id = $_GET['id'];

		$sql = "DELETE FROM kategori WHERE id_kategori = '$id'";
		$query = mysqli_query($connect, $sql);

		if ($query) {
			
			header('location:../admin/home');

		}
		else {
			echo "<script>alert('Delete Failed')</script>";
		}

	}
?>