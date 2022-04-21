<?php
session_start();
if (isset($_SESSION['adminid']) == 1) {
  unset($_SESSION["adminid"]);
}
if (isset($_SESSION['userid']) == 1) {
  unset($_SESSION["userid"]);
}
$msg = "";
$color = "red";

include "includes/header.php";
if (isset($_POST['submit'])) {
  $fullname = $_POST['name'] . " " . $_POST['surname'];
  $email = trim($_POST['email']);
  $pass = $_POST['password'];
  $cpass = $_POST['repassword'];

  // student code

  $count_my_page = ("studentid.txt");
  $hits = file($count_my_page);
  $hits[0]++;
  $fp = fopen($count_my_page, "w");
  fputs($fp, "$hits[0]");
  fclose($fp);
  $StudentId = $hits[0];



  if ($pass != $cpass)
    $msg = "Passwords don't match!";
  else {
    include "includes/config.php";
    $query = "SELECT COUNT(*) as count from tblstudents where EmailId = '{$email}';";
    $run = mysqli_query($con, $query);
    //$get_row = mysqli_fetch_array($run);
    $get_row = mysqli_fetch_assoc($run);
    if ($get_row['count'] != 0) {
      $msg = "Email already registered!";
    } else {

      $passEnc = md5($pass);
      $reg_query = "INSERT INTO `tblstudents` (FullName,StudentId, EmailId, Password, Status) VALUES(
                                    '{$fullname}','{$StudentId}', '{$email}', '{$passEnc}', 1);";
      if (mysqli_query($con, $reg_query)) {
        $msg = "Successfully registered";
        $color = "green";
        header("Location: userlogin.php");
      } else
        $msg = "Could not register";
    }
  }
}
?>
<main>
  <div class="bg-pic"></div>
  <div class="main">
    <div class="myContainer height-100 flex center col-direct">
      <div class="center-main">
        <div class="login-div">
          <h2>Signup</h2>
          <form method="post" role="form">
            <input type="text" name="name" placeholder="Name" required />
            <input type="text" name="surname" placeholder="Surname" required />
            <input type="email" name="email" placeholder="E-mail" required />
            <input type="password" minlength="4" name="password" placeholder="Password" required />
            <input type="password" minlength="4" name="repassword" placeholder="Re-Password" required />

            <input type="submit" id="submit" name="submit" value="Signup" />
            <p style="color:<?= $color ?>; font-size:1rem;padding-top:.5rem"><?= $msg ?></p>

            <span>
              Already have an account? <a href="userlogin.php">Login</a>
            </span>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
include "includes/footer.php";
?>