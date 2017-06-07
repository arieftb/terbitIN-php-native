<?php
include "../config/obstart.php";

session_start();
if (!empty($_SESSION['name']) || !empty($_SESSION['pnumber'])) {

  header('location:admin/home');

}
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

				<ul class="left back">
					<i class="fa fa-arrow-left small" onclick="history.go(-1);" aria-hidden="true"></i>
				</ul>
				<ul iid="nav-mobile" class="right hide-on-med-and-down">

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

	<br><br>

	<div class="container">

		<div class="section">
			<!--   Icon Section   -->
			<div class="row">

				<div class="col s12 m6 offset-m3 white z-depth-1">

					<h5 class="center">Login</h5>
					<div class="divider"></div>
					<form action="" method="POST">

						<div class="col s12 m12">

							<div class="input-field col s12 m12">
								<input placeholder="Name" name="name" id="name" type="text" class="validate">
								<label for="name"></label>
							</div>

						</div>

						<div class="col s12 m12">

							<div class="input-field col s12 m12">
								<input placeholder="Phone Number" name="pnumber" id="pnumber" type="number" class="validate" value="62">
								<label for="pnumber"></label>
							</div>

						</div>

						<div class="col s12 m3">

							<button class="btn waves-effect waves-light orange" type="submit" name="login">Login</button>

							<br><br>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="js/init.js"></script>

	<?php
	if (isset($_POST['login'])) {
		include "../config/connection.php";

		$name = $_POST['name'];
		$pnumber = $_POST['pnumber'];

		if ($name == '' || $pnumber == '') {
			echo "<script>alert('Form Empty')</script>";
		}

		$sql = "SELECT * FROM pengarang WHERE nama = '$name' AND no_hp = '$pnumber'";

		$query = mysqli_query($connect, $sql);

		if (!$query) {
			printf("Error: %s\n", mysqli_error($connect));
			exit();
		}

		$row = mysqli_fetch_array($query);

		if ($row['nama'] == $name AND $row['no_hp'] == $pnumber) {
			
			echo "<script>alert('Login Success')</script>";

			session_start();

			$_SESSION['name'] = $row['nama'];
			$_SESSION['pnumber'] = $row['no_hp'];

			header('location:admin/home');

		}
		else {
			echo "<script>alert('Login Failed')</script>";;
		}
	}
	?>

</body>
</html>
