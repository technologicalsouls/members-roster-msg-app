<?php session_start();
  require_once('../includes/config.php');
  unset($_SESSION['uuid']);
  unset($_SESSION['first']);
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- META TAGS -->
    <meta http-equiv="cache-control" content="no-cache">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Black Fish Tattoo :: Artist Login</title>
  </head>

  <body>
    <a id="login-page">
      <a href="artistdashboard.php?<?php $_SESSION['uuid']?>" class="ad-nav btn">back to your account</a>
      <?php
        if(isset($_GET['error'])){
          echo '<div class="notice">Error. Please try again.</div>';
        };
      ?>
      <h2 class="text-center">Artist Login</h2>
      <form class="forms" id="artistlogin" method="POST" action="artistloginDH.php" enctype="multipart/form-data">
        <div class="form-row">
          <div class="col mb-3">
            <label for="first">Name</label>
            <input type="text" name="first" class="form-control" placeholder="Jonny Doe" required>
          </div>
        </div>
        <div class="form-row">
          <div class="col mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" placeholder="look@me.com" required>
          </div>
        </div>
        <div class="form-row">
          <div class="col mb-3">
            <label for="pw">Password</label>
            <input type="password" name="pw" class="form-control" placeholder="something" required>
          </div>
        </div>
        <input type="submit" name="submit" value="Log In" class="btn">
      </form>
    </a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
  </body>

</html>