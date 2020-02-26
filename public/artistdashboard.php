<?php session_start();
require_once('../includes/config.php');

if (!$_SESSION['uuid'] && !$_SESSION['aname']) {
  header('location:index.php');
};
$uuid = $_SESSION['uuid'];
?>
<!DOCTYPE html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Black Fish Tattoo :: Your Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/23838f0113.js"></script>
<link rel="stylesheet" href="assets/css/style.css">

<body>
  <!-- ARTIST DASHBOARD -->
  <div id="adb">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php
            if (isset($_SESSION['uuid'])) {
              echo  '
              <form id="lgot" action="logout.php" method="post">
                <input class="btn mb-5" type="submit" value="Log Out" name="submit">
              </form>';
            } else {
              echo '<a class="btn mb-5" href="artistlogin.php">Artists\' Login</a>';
            };
          ?>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <h2 class="text-center text-md-right">Hello, <?php echo $_SESSION['aname']; ?>!</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 m-0">
          <h3 class="acct-display-header my-5">Your Messages</h3>
          <div id="msg-display">
            <?php
            $sqlmsg = "SELECT * FROM messages WHERE artist_uuid = $uuid";
            $resultmsg = mysqli_query($conn, $sqlmsg);
            if (mysqli_num_rows($resultmsg) > 0) {
              while ($rowmsg = mysqli_fetch_assoc($resultmsg)) {
                $ts = date('m/d/Y', strtotime($rowmsg['date_post']));
                echo '
                  <div id="msg' . $rowmsg['cuid'] . '" class="my-5 container-fluid">
                    <div class="row">
                    <div class="col-lg-2 order-last order-lg-first">
                    </div>
                    <div class="d-inline-block col col-lg-7">
                      <div class="card-body pb-2 px-0 pb-md-0 pr-md-3">
                        <p class="card-title"><span class="msg-label">Subject: </span>' . $rowmsg['msgsubj'] . '</p>
                        <p class="card-text"><span class="msg-label">From:</span>  ' . $rowmsg['first_name'] . ' ' . $rowmsg['last_name'] . '</p>
                        <p class="card-text"><span class="msg-label">Email:</span>  ' . $rowmsg['email'] . '</p>

                        <p class="card-text"><span class="msg-label">Date Sent: </span> ' . $ts . '</p>
                        <a class="btn" data-toggle="collapse" href="#msgbody' . $rowmsg['cuid'] . '" aria-expanded="false" aria-controls="msgbody' . $rowmsg['cuid'] . '">Read Message</a>
                          <div class="collapse" id="msgbody' . $rowmsg['cuid'] . '">
                            <div class="card card-body card-text">
                            ' . $rowmsg['msg'] . '

                            <img src="' . $rowmsg['imgpath'] . '" class="img-thumbnail">
                              <form method="POST" action="msgdeleteDH.php" class="mb-md-5"><input type="submit" name="delete" class="btn mt-5" value="Delete">
                              <input type="hidden" name="cuid" value="' . $rowmsg['cuid'] . '">
                              </form>
                            </div>
                          </div>
                      </div>
                    </div>
                    </div>
                  </div>';
                }
              };
            ?>
          </div>
        </div>
        <div class="col-lg-4 m-0 order-first order-lg-last">
          <h3 class="acct-display-header my-5" id="profile">Your Profile</h3>
          <div id="acct-panel" class="container-fluid p-0">
            <table>
              <tr>
                <td class="msg-label">Name:</td>
              </tr>
              <tr>
                <td><?php echo $_SESSION['aname']; ?></td>
              </tr>
              <tr>
                <td class="msg-label">Email:</td>
              </tr>
              <tr>
                <td><?php echo $_SESSION['email']; ?></td>
              </tr>
            </table>
          </div>
          <h3 class="acct-display-header my-5" id="roster">Current Artists</h3>
          <div id="roster-panel" class="container-fluid p-0">
            <?php
            $sql = "SELECT * FROM artists";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                if ($_SESSION['aname'] != 'Kevin' && $_SESSION['uuid'] != '1') {
                  echo '<table class="a-info my-5">
          <tr>
            <td class="msg-label">Name:</td>
          </tr>
          <tr>
            <td>' . $row['artist_name'] . '</td>
          </tr>
          <tr>
            <td class="msg-label">Email:</td>
          </tr>
          <tr>
            <td>' . $row['email'] . '</td>
          </tr>
          </table>';
                } else {
                  echo '<table class="a-info my-5">
          <tr>
            <td class="msg-label">Name:</td>
          </tr>
          <tr>
            <td>' . $row['artist_name'] . '</td>
          </tr>
          <tr>
            <td class="msg-label">Email:</td>
          </tr>
          <tr>
            <td>' . $row['email'] . '</td>
          </tr>
          <tr>
          <td>
          <button type="button" class="btn rmva-btn" name="' . $row['artist_name'] . '" value="' . $row['uuid'] . '" id="' . $row['uuid'] . '">remove ' . $row['artist_name'] . '</button>
          </td>
          </tr>
          </table>';
                };
              };
            };
            mysqli_close($conn);
            ?>
          </div>
          <?php
          if (isset($_SESSION['aname']) == 'grei' && isset($_SESSION['uuid']) == '1') {
            echo ' <div><a href="addnew.php"><h3 id="add-new" class="btn">Add Artist</h3></a></div>';
          };
          ?>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="assets/js/artistdashboardScript.js">
  </script>

  <?php
  include('deleteartistmodal.php');
  ?>
</body>

</html>