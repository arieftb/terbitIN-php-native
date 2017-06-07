<?php
include "../config/obstart.php";
include "../config/connection.php";

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
  <nav class="nav-extended pink lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">terbitIN</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li>
          <div class="input-field">
            <input id="search" type="search" required>
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>
        </li>

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

    <div class="nav-content container">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#publish">Publish</a></li>
        <li class="tab"><a href="#test2">Your Book</a></li>
        <li class="tab disabled"><a href="#test3">Disabled Tab</a></li>
        <li class="tab"><a href="#test4">Test 4</a></li>
      </ul>

    </div>

  </nav>

  <br><br>


  <div class="container">

    <div class="section" id="publish">
      <!--   Icon Section   -->
      <div class="row">

        <div class="col s12 m6 offset-m3 white z-depth-1">

          <h5 class="center pink-text">Publish</h5>
          <div class="divider"></div>
          <form action="" method="POST" enctype="multipart/form-data">

            <div class="col s12 m12">

              <div class="input-field col s12 m12">
                <input placeholder="Judul" name="title" id="title" type="text" class="validate">
                <label for="title"></label>
              </div>

            </div>

            <div class="col s12 m12">

              <div class="input-field col s12 m12">
                <input placeholder="ISBN" name="isbn" id="isbn" type="number" class="validate">
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
                <label>Category</label>

              </div>
            </div>


            <div class="col s12 m12">

              <button class="btn-submit btn waves-effect waves-light orange" type="submit" name="publish">Publish</button>

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

  <br></body>


  <!--  Scripts-->
  <script src="../js/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>

  <script type="text/javascript">

   $(document).ready(function() {
    $('select').material_select();
  });
</script>


<?php
if (isset($_POST['publish'])) {

  $title = $_POST['title'];
  $isbn = $_POST['isbn'];
  $category = $_POST['category'];
  $loct_pic = $_FILES['cover']['tmp_name'];
  $name_pic = $_FILES['cover']['name'];
  $file_ext = strtolower(end(explode('.', $name_pic)));



  $folder = '../img/cover/'.$title.'.'.$file_ext;

  $name_pic = $title.'.'.$file_ext;


  if ($name_pic == '') {
    $name_pic = '/default/no-pic-book.png';
  }

  move_uploaded_file($loct_pic, "$folder");



  $inputBuku = "INSERT INTO buku (id_buku, judul_buku, isbn, image_cover, id_kategori)
  VALUES ('', '$title', '$isbn', '/cover/$name_pic', '$category')";
  $query1 = mysqli_query($connect, $inputBuku);

  $readBuku = "SELECT * FROM buku WHERE isbn = '$isbn'";
  $query2 = mysqli_query($connect, $readBuku);
  $row = mysqli_fetch_array($query2);

  $id_buku = $row['id_buku'];

  $readPengarang = "SELECT * FROM pengarang WHERE nama = '$name' AND no_hp = '$pnumber'";
  $query3 = mysqli_query($connect, $readPengarang);

  $row2 = mysqli_fetch_array($query3);

  $id_pengarang = $row2['id_pengarang'];

  $inputBukuPengarang = "INSERT INTO buku_pengarang (id_buku, id_pengarang)
  VALUES ('$id_buku', '$id_pengarang')";
  $query4 = mysqli_query($connect, $inputBukuPengarang);



  if ($query3 && $query4) {
    echo "<script>alert('Success')</script>";
    header('location:home');
  }
  else {
    echo "Gagal";
  }
}

if (isset($_POST['add_cat'])) {

  $cat = $_POST['cat'];

  $sql = "INSERT INTO kategori (id_kategori, nama_kategori) VALUES ('', '$cat')";

  $query = mysqli_query($connect, $sql);


  if ($query) {
    header('location:home');
  }
  else {
    echo "<script>alert('Add Failed')</script>";
  }

}
?>


</body>
</html>