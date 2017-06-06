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
</head>
<body class="grey lighten-5">
  <div class="navbar-fixed">
    <nav class="pink lighten-1" role="navigation">
      <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">terbitIN</a>
        <ul iid="nav-mobile" class="right hide-on-med-and-down">
          <li>
              <div class="input-field">
                <input id="search" type="search" required>
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
              </div>
          </li>
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
    <div class="section white">
      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m12">
          <div class="icon-block">
            <h5 class="center">Register</h5>
            <div class="divider"></div>
            <div class="col s12 m12">
              <div class="input-field col s6">
                <input placeholder="First Name" name="fname" id="first_name" type="text" class="validate">
                <label for="first_name"></label>
              </div>
              <div class="input-field col s6">
                <input placeholder="Last Name" name="lname" id="last_name" type="text" class="validate">
                <label for="last_name"></label>
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
                  <span>File</span>
                  <input type="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
            </div>

            <div class="col s12 m3">
              <button class="btn waves-effect waves-light orange" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
              </button>
            </div>
          </div>
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


  <!--  Scripts-->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
