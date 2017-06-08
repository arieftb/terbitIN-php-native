<?php
include "config/obstart.php";
include "config/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>terbitIN</title>

	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/me.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link rel="stylesheet" href="css/font-awesome.min.css">

</head>
<body class="grey lighten-5">
	<div class="navbar-fixed">
		<nav class="pink lighten-1" role="navigation">
			<div class="nav-wrapper container"><a id="logo-container" href="home" class="brand-logo">terbitIN</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li>
						<div class="input-field">
							<input id="search" type="search" required>
							<label class="label-icon" for="search"><i class="material-icons">search</i></label>
							<i class="material-icons">close</i>
						</div>
					</li>

					<li>
						<a class='dropdown-button' data-beloworigin="true" href='#' data-activates='dropdown1'><i class="material-icons">more_vert</i></a>
					</li>

					<ul id='dropdown1' class='dropdown-content'>
						<li><a href="login" class="pink-text lighten-1">LOGIN</a></li>
						<li><a href="register" class="pink-text lighten-1">REGISTER</a></li>
					</ul>
				</ul>

				<ul id="nav-mobile" class="side-nav">
					<li><a href="#">Navbar Link</a></li>
				</ul>
				<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
			</div>
		</nav>
	</div>
	<div class="section no-pad-bot bg-head" id="index-banner">
		<div class="container">
			<br><br>
			<h1 class="header center white-text">terbit<b class="pink-text lighten-1">IN</b></h1>
			<div class="row center">
				<h5 class="header col s12 light"> <span class=" bg-text-head  white-text"> Publish Your Own Book Here </span></h5>
			</div>
			<div class="row center">
				<a href="register" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a>
			</div>
			<br><br>

		</div>
	</div>

	<br><br>

	<div class="container">
		<div class="section">
			<!--   Icon Section   -->
			<div class="row">

				<?php 

				if (isset($_GET['id'])) {

					$id = $_GET['id'];

					$readBook = "SELECT * FROM buku_pengarang BP JOIN buku B ON B.id_buku = '$id' JOIN kategori K ON K.id_kategori = B.id_kategori JOIN pengarang P ON P.id_pengarang = BP.id_pengarang WHERE BP.id_buku = '$id'";

						// $sql = "SELECT * FROM kategori WHERE id_kategori = '$id'";
					$query = mysqli_query($connect, $readBook);

					$rowBook = mysqli_fetch_array($query);

				}

				?>

				<div class="col s12 m6 offset-m3 white z-depth-1">

					<h5 class="center pink-text"><?php echo $rowBook['judul_buku']; ?></h5>
					<div class="divider"></div>

					<br /> <br />

					<div class="col s12 offset-m3 m6">

						<img src="img<?php echo $rowBook['image_cover']; ?>" alt="<?php echo $rowBook['judul_buku'] ?>" class="responsive-img"/>

					</div>

					<div class="col s12 m12">

						<div class="input-field col s12 m12">
							<input placeholder="ISBN" name="isbn" id="isbn" type="text" class="validate" value="ISBN : <?php echo $rowBook['isbn']; ?>" disabled>
							<label for="isbn"></label>
						</div>

					</div>

					<div class="col s12 m12">
						<div class="col s12 m12">
							<h6> Author : <?php echo $rowBook['nama']; ?></h6>
						</div>
					</div>


					<div class="col s12 m12">
						<div class="col s12 m12">
							<h6> Category : <?php echo $rowBook['nama_kategori']; ?><br> <br></h6>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>


	<!--  Scripts-->
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="js/init.js"></script>

</body>
</html>
