<?php

include("./config/db_connect.php");

$errors = array('email' => '', "tos" => '');

if (isset($_POST["submit"])) {

  if (empty($_POST["email"])) {
    $errors['email'] =  "Email address is required";
  } else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Please provide a valid e-mail address";
    }
  }

  if (isset($_POST['checkbox']) && $_POST['checkbox'] != "") {
  } else {
    $errors['tos'] =  "You must accept the terms and conditions";
  }

  if (array_filter($errors)) {
  } else {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    $sql = "INSERT INTO email(email) VALUES('$email')";

    if (mysqli_query($conn, $sql)) {
      header('Location: subscribe.php');
    } else {
      echo "query error: " . mysqli_error($conn);
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="main.css" />
  <script src="https://kit.fontawesome.com/8f1578d56d.js" crossorigin="anonymous"></script>
  <title>Magebit Junior</title>
</head>

<body>
  <div class="container">
    <main>
      <header>
        <div class="title">
          <img src="./images/Union.png" alt="logo" />
          <h3>pineapple.</h3>
        </div>
        <nav>
          <a href="#">About</a>
          <a href="#">How It Works</a>
          <a href="#">Contact</a>
        </nav>
      </header>
      <section>
        <div class="subscribe">
          <h1 class="subscribe-title">Subscribe to newsletter</h1>
          <p class="discount">
            Subscribe to our newsletter and get 10% discount on pineapple
            glasses.
          </p>
          <form id="form" action="index.php" method="POST">
            <div class="email-form">
              <input class="email" name="email" id="email" type="text" placeholder="Type your email address here..." />
              <button type="submit" value="submit" name="submit" class="btn" id="send">
                <i class="fas fa-arrow-right"></i>
              </button>
            </div>
            <span id="error" class="failed">
              <?php echo $errors['email']; ?>
            </span>

            <div class="tos" class="failed">
              <input name="checkbox" type="checkbox" id="check" />
              <p>I agree to <a href="#">terms of service</a></p>
            </div>
            <div id="tosError"><?php echo $errors['tos'] ?></div>
          </form>
        </div>
      </section>
      <footer>
        <div class="underline"></div>
        <div class="socials">
          <a class="face" href="#">
            <div class="icon-wrapper">
              <i class="fab fa-facebook-f"></i>
            </div>
          </a>
          <a class="insta" href="#">
            <div class="icon-wrapper">
              <i class="fab fa-instagram"></i>
            </div>
          </a>
          <a class="twit" href="#">
            <div class="icon-wrapper">
              <i class="fab fa-twitter"></i>
            </div>
          </a>
          <a class="tube" href="#">
            <div class="icon-wrapper">
              <i class="fab fa-youtube"></i>
            </div>
          </a>
        </div>
      </footer>
    </main>
    <div class="image-section"><img src="./images/Image.png" alt="" /></div>
  </div>

  <script src="validation.js"></script>
</body>

</html>