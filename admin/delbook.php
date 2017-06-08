<?php
	include '../config/connection.php';

	if (isset($_GET['id'])) {
		
		$id = $_GET['id'];

		$readBook = "SELECT * FROM buku WHERE id_buku = '$id'";
		$query = mysqli_query($connect, $readBook);
		$row = mysqli_fetch_array($query);

		$picname = $row['image_cover'];

// /opt/lampp/htdocs

		unlink('/opt/lampp/htdocs/terbitIN/img'.$picname);

		// echo "$picname";
		// print_r('/opt/lampp/htdocs/terbitIN/img$picname');

		$sql = "DELETE FROM buku WHERE id_buku = '$id'";
		$query = mysqli_query($connect, $sql);

		if ($query) {
			
			header('location:../admin/home');

		}
		else {
			echo "<script>alert('Delete Failed')</script>";
		}

	}
?>