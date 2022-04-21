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
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['login'])) {

  include "includes/config.php";
  if ($con) {
    $msg = "Connection problem occured with database!";
  }

  $email = mysqli_real_escape_string($con, trim($_POST['email']));
  $pass = mysqli_real_escape_string($con, trim($_POST['password']));
  $hashedPass = md5($pass); //123 = 202cb962ac59075b964b07152d234b70

  $query = "SELECT id, FullName, status FROM `tblstudents` WHERE EmailId = '" . $email . "' AND Password = '" . $hashedPass . "'";

  $run_query = mysqli_query($con, $query);
  $rows_fetched = mysqli_num_rows($run_query);
  $fetch = mysqli_fetch_assoc($run_query);


  $user_id = $fetch['id'];
  $FullName = $fetch['FullName'];
  $status = $fetch['status'];
  $name = trim(explode(" ", $FullName)[0]);
  if ($rows_fetched == 1) {
    if ($status != 1) {

      $msg = "You are blocked by an admin";
    } else {
      $_SESSION['userid'] = $user_id;
      $_SESSION['name'] = $name;

      header("Location: dashboard.php");
    }
  } else
    $msg = "Email or password is incorrect!";
}
include "includes/header.php";
?>

<main>
  <div class="bg-pic"></div>
  <div class="main">
    <div class="myContainer height-100 flex center col-direct">
      <div class="center-main">
        <div class="login-div">
          <h2>User Login</h2>
          <form method="post" role="form">
            <input type="email" placeholder="E-mail" autocomplete="off" required name="email" />
            <input type="password" minlength="4" required placeholder="Password" name="password" />
            <div class="chcbox">
              <input type="checkbox" id="chcbox" name="remember" />
              <label for="chcbox">Remember me</label>
            </div>
            <input type="submit" name="login" id="submit" value="Login" />
            <p style="color:<?= $color ?>; font-size:1rem;padding-top:.5rem"><?= $msg ?></p>

            <span>
              Don't have an account <a href="signup.php">Create now!</a>
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