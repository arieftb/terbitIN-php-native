<?php
include 'obstart.php';
include 'connection.php';

session_start();
if (empty($_SESSION['name']) || empty($_SESSION['pnumber'])) {

	header('location:../login');

}

$name = $_SESSION['name'];
$pnumber = $_SESSION['pnumber'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>terbitIN</title>

	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../css/me.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link rel="stylesheet" href="../css/font-awesome.min.css">

</head>
<body class="grey lighten-5">
	<div class="navbar-fixed">
		<nav class="pink lighten-1" role="navigation">
			<div class="nav-wrapper container"><a id="logo-container" href="../admin/home" class="brand-logo">terbitIN</a>

				<ul class="left back">
					<i class="fa fa-arrow-left small" onclick="history.go(-1);" aria-hidden="true"></i>
				</ul>
				<ul iid="nav-mobile" class="right hide-on-med-and-down">					

					<?php

					$sql = "SELECT * FROM pengarang WHERE nama = '$name' AND no_hp = '$pnumber'";
					$query = mysqli_query($connect, $sql);

					$row = mysqli_fetch_array($query);

					?>

					<li>

						<a class='dropdown-button' data-beloworigin="true" href='#' data-activates='dropdown1'>
							<!-- <i class="material-icons">settings</i>  -->
							<img src="../img<?php echo $row['foto_pengarang']; ?>" class="circle img-respon">
							<?php echo $row['nama']; ?>
						</a>
					</li>


					<ul id='dropdown1' class='dropdown-content'>

						<li><a href="../config/logout.php" class="pink-text lighten-1">LOGOUT</a></li>
						<li><a href="../register" class="pink-text lighten-1">REGISTER</a></li>
					</ul>

				</ul>

				<ul id="nav-mobile" class="side-nav">
					<li><a href="#">Navbar Link</a></li>
				</ul>
				<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
			</div>
		</nav>
	</div>


	<br><br>

	<div class="container">

		<div class="section">
			<!--   Icon Section   -->
			<div class="row">

				
				<div class="col s12 offset-m3 m6 white z-depth-1">
					<h5 class="center pink-text">Edit Category</h5>
					<div class="divider"></div>

					<?php 

					if (isset($_GET['id'])) {

						$id = $_GET['id'];

						$sql = "SELECT * FROM kategori WHERE id_kategori = '$id'";
						$query = mysqli_query($connect, $sql);

						$row = mysqli_fetch_array($query);

					}

					?>


					<form action="" method="POST">
						<div class="input-field col s12 m8">
							<input name="cat" id="cat" type="text" class="validate" value="<?php echo $row['nama_kategori']; ?>">
							<label for="cat"></label>
						</div>

						<div class="input-field col s12 m4">

							<button class="btn-submit btn waves-effect waves-light pink lighten-1" type="submit" name="update_cat">Update</button>

							<br><br>

						</div>
					</form>

				</div>

			</div>

		</div>

	</div>

	<br><br>

	<script src="../js/jquery-2.1.1.min.js"></script>
	<script src="../js/materialize.js"></script>
	<script src="../js/init.js"></script>


	<?php
	if (isset($_POST['update_cat'])) {
		
		$cat = $_POST['cat'];

		$sql = "UPDATE kategori SET nama_kategori = '$cat' WHERE id_kategori = '$id'";

		$query = mysqli_query($connect, $sql);

		if ($query) {
			echo "<script>alert('Update Success')</script>";
			header('location:../admin/home');
		}
		else {
			echo "Gagal";
		}
	}
	?>

</body>
</html>