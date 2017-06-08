<?php
include "config/obstart.php";
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
            <div class="input-field">
              <input id="search" type="search" required>
              <label class="label-icon" for="search"><i class="material-icons">search</i></label>
              <i class="material-icons">close</i>
            </div>
          </li>

          <li>
            <a class='dropdown-button' data-beloworigin="true" href='#' data-activates='dropdown1'><i class="material-icons">settings</i></a>
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

    <div class="section white z-depth-1">
      <!--   Icon Section   -->
      <div class="row">

        <div class="col s12 m12">

          <h5 class="center">Register</h5>
          <div class="divider"></div>
          <form action="" method="POST" enctype="multipart/form-data">

            <div class="col s12 m12">

              <div class="input-field col s12 m12">
                <input placeholder="Name" name="autname" id="name" type="text" class="validate">
                <label for="name"></label>
              </div>

            </div>

            <div class="col s12 m12">

              <div class="input-field col s12">
                <input placeholder="Phone Number" name="pnumber" id="pnumber" type="number" class="validate" value="62">
                <label for="pnumber"></label>
              </div>

            </div>

            <div class="col s12 m12">

              <div class="input-field col s12">
                <input placeholder="Address" name="address" id="address" type="text" class="validate">
                <label for="address"></label>
              </div>

            </div>

            <div class="col s12 m12">

              <div class="file-field input-field">
                <div class="btn pink lighten-1">
                  <span>Photo</span>
                  <input type="file" name="photo">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>

            </div>

            <div class="col s12 m2 offset-m5">

              <button class="btn waves-effect waves-light orange" type="submit" name="submit">Submit</button>

            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

  <br><br>

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>

  <!-- Insert PHP -->

  <?php
  if (isset($_POST['submit'])) {
    include "config/connection.php";

    $name = $_POST['autname'];
    $pnumber = $_POST['pnumber'];
    $address = $_POST['address'];
    $loct_pic = $_FILES['photo']['tmp_name'];
    $name_pic = $_FILES['photo']['name'];
    $file_ext = strtolower(end(explode('.', $name_pic)));

    $folder = 'img/photo/'.$name.'.'.$file_ext;


    $name_pic = $name.'.'.$file_ext;

    if ($name_pic == '') {
      $name_pic = '/default/no-ava.png';
    }

    move_uploaded_file($loct_pic, "$folder");


    $sql = "INSERT INTO pengarang (id_pengarang, nama, no_hp, alamat, foto_pengarang)
    VALUES ('', '$name', '$pnumber', '$address', '/photo/$name_pic')";

    $query = mysqli_query($connect, $sql);

    if ($query) {
      echo "<script>alert('Registration Success')</script>";
      header('location:home');
    }
    else {
      echo "<script>alert('Registration Failed')</script>";
    }
  }
  ?>


  <!--  Scripts-->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

</body>
</html>