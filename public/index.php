<?php session_start();
  require_once('../includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- META TAGS -->
    <meta content="no-cache" http-equiv="cache-control">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="" name="description">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet" type="text/css">
    <title>Black Fish Tattoo</title>
    </script>

  </head>

  <body>

    <header>
      <div class="collapse" id="navbartoggle">
        <div class="bg-dark navbar-dark p-0">
          <p class="text-muted">Midtown - Manhattan - NYC</p>
          <p class="text-muted">(646) 473-1059</p>
          <a class="link" href="#">About</a>
          <a id="home-nav" class="link active" href="#">Home</a>
          <a class="link" href="#">About Our Artists</a>
        </div>
      </div>
      <nav class="navbar fixed-top navbar-dark bg-dark flex-column m-0">
        <button class="navbar-toggler p-0" type="button" data-toggle="collapse"
                data-target="#navbartoggle" aria-controls="navbartoggle"
                aria-expanded="false" aria-label="Toggle navigation">
          <img src="./assets/img/logo300.svg" class="nav-img">
          <p class="pt-1 text-muted">navigate black fish</p>
        </button>
      </nav>
    </header>

    <div id="main" class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1 class="mt-5">Black Fish Tattoo</h1>
        </div>
        <div class="col-sm">
          <!-- <div class="section"> -->
          <h2 class="pt-5" class="py-5">About</h2 class="pt-5">

          <p class="description">Tucked away on 32nd street in Midtown Manhattan, Black Fish Tattoo's studio has been
            offering top quality tattoos for over 20 years. Owner and veteran tattoo artist Kevin Jang, creates original
            designs and artwork no charge. He can tattoo in any style and specializes in realistic images. So, drop by
            any time with your pictures, ideas and inspirations.</p>
        </div>
        <div class="col-sm">
          <h2 class="pt-5">Artists</h2 class="pt-5">
          <a href="#" class="description btn">See our artists' work.</a>
          <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="assets/img/kevin.jpg" class="d-block w-100">
                  <div class="carousel-caption">
                    <h5>Kevin</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="assets/img/chris.jpg" class="d-block w-100">
                  <div class="carousel-caption">
                    <h5>Chris</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="assets/img/teddy.jpg" class="d-block w-100">
                  <div class="carousel-caption">
                    <h5>Teddy</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="assets/img/dani.jpg" class="d-block w-100">
                  <div class="carousel-caption">
                    <h5>Dani</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="assets/img/drex.jpg" class="d-block w-100">
                  <div class="carousel-caption">
                    <h5>Drexel</h5>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm">
          <h2 class="pt-5">Contact</h2>
          <div id="msgsent"></div>

          <div class="forms">
            <form method="POST" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col">
                  <label for="cfirst">First name</label>
                  <input type="text" name="cfirst" class="form-control" placeholder="Jonny" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="clast">Last name</label>
                  <input type="text" name="clast" class="form-control" placeholder="Doe" required>
                </div>
              </div>
              <div class="form-row">
                <label for="cemail">Your Email</label>
                <input type="email" name="cemail" class="form-control" placeholder="email@example.com" required>
              </div>
              <div class="form-row">
                <div class="col-md-7 mb-3">
                  <label for="cartists">Select Artist</label>
                  <select type="select" name="cartists" class="form-control">
                    <option disabled selected value required> -- Select Art -- </option>
                    <?php
                      $sql = "SELECT uuid, artist_name FROM artists";
                      $result = mysqli_query($conn, $sql);
                      if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                          echo '
                            <option value="'.$row['uuid'].'">'.$row['artist_name'].'</option>';
                          };
                      };
                      mysqli_close($conn);
                    ?>
                  </select>
                </div>
                <div class="col-md-5 mb-3">
                  <label for="cphoto">Img</label>
                  <input type="file" name="cphoto" class="form-control">
                </div>
              </div>
              <div class="form-row">
                <div class="col mb-3">
                  <label for="subject">Subject</label>
                  <input type="text" name="subject" class="form-control" placeholder="i.e. Consultation" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col mb-3">
                  <label for="msg">Your message here...</label>
                  <textarea name="msg" id="msg" class="form-control" rows="4"
                            placeholder="Please write your message here" required></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="challenge">Please answer the following: solve for x<br><br> x = 4 + 9</label>
                <input id="challenge" name="challenge" type="text" class="form-control" required
                       placeholder="your answer here">
              </div>
              <div class="form-row">
                <input type="submit" class="btn my-5" value="Send Message">
              </div>
            </form>
          </div>
        </div>
        <div class="col-12">
          <!-- <div class="section"> -->
          <h2 class="pt-5" class="py-5">Location</h2 class="pt-5">
          <div class="description">
            Black Fish Tattoo
            (646) 473-1059
            <address>39 W 32nd St #1205, New York, NY 10001</address>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1511.2566309428908!2d-73.9836956!3d40.7507346!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a8ffffffff%3A0x64b301408df33061!2sBlack%20Fish%20Tattoo!5e0!3m2!1sen!2sus!4v1581133238922!5m2!1sen!2sus"
                    frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
      <footer class="mt-5">
        <a class="ad-nav btn" href="artistlogin.php">artist login</a>
      </footer>
    </div>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
    <script src="assets/js/ajaxcontact.js"></script>
  </body>

</html>