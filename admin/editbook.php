<?php
include '../config/obstart.php';
include '../config/connection.php';

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


					$id_pengarang = $row['id_pengarang'];
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

				<div class="col s12 m6 offset-m3 white z-depth-1">

					<h5 class="center pink-text">Edit Book</h5>
					<div class="divider"></div>

					<?php 

					if (isset($_GET['id'])) {

						$id = $_GET['id'];

						$readBook = "SELECT * FROM buku_pengarang BP JOIN buku B ON B.id_buku = '$id' JOIN kategori K ON K.id_kategori = B.id_kategori JOIN pengarang P ON P.id_pengarang = BP.id_pengarang WHERE BP.id_buku = '$id'";

						// $sql = "SELECT * FROM kategori WHERE id_kategori = '$id'";
						$query = mysqli_query($connect, $readBook);

						$rowBook = mysqli_fetch_array($query);

					}

					?>

					<form action="" method="POST" enctype="multipart/form-data">

						<div class="col s12 m12">

							<div class="input-field col s12 m12">
								<input placeholder="Title" name="title" id="title" type="text" class="validate" value="<?php echo $rowBook['judul_buku']; ?>" required>
								<label for="title"></label>
							</div>

						</div>

						<div class="input-field col s12">
							<select multiple name="author[]">
								<option value="" disabled selected>Author</option>

								<?php

								$readAuth = "SElECT * FROM pengarang ORDER BY nama ASC";
								$queryAuth = mysqli_query($connect, $readAuth);

								while($rowAuth = mysqli_fetch_assoc($queryAuth)){

									?>
									<option value="<?php echo $rowAuth['id_pengarang']; ?>"><?php echo $rowAuth['nama']; ?></option>

									<?php } ?>
								</select>
							</div>


							<div class="col s12 m12">

								<div class="input-field col s12 m12">
									<input placeholder="ISBN" name="isbn" id="isbn" type="text" class="validate" value="<?php echo $rowBook['isbn']; ?>">
									<label for="isbn"></label>
								</div>

							</div>

							<div class="col s12 m12">

								<div class="file-field input-field">
									<div class="btn pink lighten-1">
										<span>Cover</span>
										<input type="file" name="cover">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text">
									</div>
								</div>

							</div>

							<div class="col s12">
								<div class="input-field col s12">
									<select name="category">
										<option value="" disabled selected>Category</option>

										<?php

										$sql = "SElECT * FROM kategori ORDER BY nama_kategori ASC";
										$query = mysqli_query($connect, $sql);

										while($row = mysqli_fetch_assoc($query)){

											?>
											<option value="<?php echo $row['id_kategori'];?>" class="pink-text lighten-1"><?php echo $row['nama_kategori']; ?></option>

											<?php
										}
										?>
									</select>

								</div>
							</div>


							<div class="col s12 m12">

								<button class="btn-submit btn waves-effect waves-light orange" type="submit" name="updatebook">Edit</button>

								<br><br>

							</div>

						</form>

						<div class="col s12 m12">
							<div class="divider"></div>

							<form action="" method="POST">
								<div class="input-field col s12 m8">
									<input placeholder="New Category" name="cat" id="cat" type="text" class="validate">
									<label for="cat"></label>
								</div>

								<div class="input-field col s12 m4">

									<button class="btn-submit btn waves-effect waves-light pink lighten-1" type="submit" name="add_cat" width="100%">Add</button>

									<br><br>

								</div>
							</form>
							<div class="divider"></div>

							<table>
								<thead>
									<tr>
										<th>Category Name</th>
										<th colspan="2"><center>Action</center></th>
									</tr>
								</thead>

								<tbody>

									<?php 

									$sql = "SElECT * FROM kategori ORDER BY nama_kategori ASC";
									$query = mysqli_query($connect, $sql);

									while($row = mysqli_fetch_assoc($query)){


										?>
										<tr>
											<td><?php echo $row['nama_kategori']; ?></td>
											<td><a href="editcat.php?id=<?php echo $row['id_kategori']; ?>"><center><i class="material-icons orange-text">mode_edit</i></center></a></td>
											<td><a href="delcat.php?id=<?php echo $row['id_kategori']; ?>"><center><i class="fa fa-times small pink-text lighten-1" aria-hidden="true"></i></center></a></td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>

						</div>

					</div>

				</div>
			</div>

		</div>

		<br><br>

		<script src="../js/jquery-2.1.1.min.js"></script>
		<script src="../js/materialize.js"></script>
		<script src="../js/init.js"></script>
		<script type="text/javascript">

			$(document).ready(function() {
				$('select').material_select();
			});
		</script>


		<?php
		if (isset($_POST['updatebook'])) {

			$title = $_POST['title'];
			$isbn = $_POST['isbn'];
			$category = $_POST['category'];
			$loct_pic = $_FILES['cover']['tmp_name'];
			$name_pic = $_FILES['cover']['name'];
			$file_ext = strtolower(end(explode('.', $name_pic)));
			$author = $_POST['author'];
			$id_buku = $rowBook['id_buku'];

			if ($name_pic == '') {
				$name_pic = $rowBook['image_cover'];
			} else {

				$folder = '../img/cover/'.$title.'.'.$file_ext;

				unlink('/opt/lampp/htdocs/terbitIN/img'.$rowBook['image_cover']);

				$name_pic = '/cover/'.$title.'.'.$file_ext;

				move_uploaded_file($loct_pic, "$folder");
			}


			if ($category == '' && $author == '') {
				$sql = "UPDATE buku SET judul_buku = '$title', isbn = '$isbn', image_cover = '$name_pic' WHERE id_buku = '$id_buku'";

				$query = mysqli_query($connect, $sql);				
			} elseif ($category !='' && $author == '') {
				$sql = "UPDATE buku SET judul_buku = '$title', isbn = '$isbn', image_cover = '$name_pic', id_kategori = '$category' WHERE id_buku = '$id_buku'";

				$query = mysqli_query($connect, $sql);				
			} elseif ($category =='' && $author !='') {
				$sql = "UPDATE buku SET judul_buku = '$title', isbn = '$isbn', image_cover = '$name_pic' WHERE id_buku = '$id_buku'";

				$query = mysqli_query($connect, $sql);

				foreach ($author as $key => $v_author) {

					$updateBukuPengarang = "UPDATE buku_pengarang SET id_pengarang = '$v_author' WHERE id_buku = '$id_buku'";
					$query1 = mysqli_query($connect, $inputBukuPengarang); 

				}				
			} else {
				$sql = "UPDATE buku SET judul_buku = '$title', isbn = '$isbn', image_cover = '$name_pic', id_kategori = '$category' WHERE id_buku = '$id_buku'";

				$query = mysqli_query($connect, $sql);

				foreach ($author as $key => $v_author) {

					$updateBukuPengarang = "UPDATE buku_pengarang SET id_pengarang = '$v_author' WHERE id_buku = '$id_buku'";
					$query1 = mysqli_query($connect, $inputBukuPengarang); 

				}
			}

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