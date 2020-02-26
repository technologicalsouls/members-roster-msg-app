<?php session_start();
  require_once('../includes/config.php');

  if(!$_SESSION['uuid'] && !$_SESSION['aname']){
    header('location:index.php');
  };

  $uuid = $_SESSION['uuid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="cache-control" content="no-cache">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <title>Black Fish Tattoo</title>
</head>

<body>
  <a href="artistdashboard.php?<?php $_SESSION['uuid']?>" class="ad-nav btn">back to your account</a>
  <h2 class="text-center">Add New Artist</h2>
  <form class="forms" id="add-new-form" method="POST" action="addnewDH.php" enctype="multipart/form-data">
    <div class="form-row">
      <div class="col mb-3">
        <label for="first">Name</label>
        <input type="text" name="first" class="form-control" placeholder="Jonny Doe" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col mb-3">
        <label for="email">Your Email</label>
        <input type="email" name="email" class="form-control" placeholder="here@universe.com" required>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="pw">Create a Password</label>
        <input type="password" name="pw" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="retypepw">Re-type Password</label>
        <input type="password" name="retypepw" class="form-control" required>
      </div>
    </div>
    <input type="submit" name="submit" value="Add" class="btn">
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>
</html>