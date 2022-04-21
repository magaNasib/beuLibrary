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

  $email = mysqli_real_escape_string($con, $_POST['email']);
  $pass = mysqli_real_escape_string($con, $_POST['password']);
  $hashedPass = md5($pass); //123 = 202cb962ac59075b964b07152d234b70

  // $query = "SELECT `id`, `FullName` FROM `admin` WHERE `admin`.`AdminEmail` = {$email} AND `admin`.`Password` = {$hashedPass}';";
  $query = "SELECT id,FullName FROM admin WHERE AdminEmail='$email' AND Password='$hashedPass'";

  $run_query = mysqli_query($con, $query);
  $rows_fetched = mysqli_num_rows($run_query);
  $fetch = mysqli_fetch_assoc($run_query);
  $admin_id = $fetch['id'];
  $FullName = $fetch['FullName'];
  $name = trim(explode(" ", $FullName)[0]);
  if ($rows_fetched == 1) {
    $msg = "";
    $_SESSION['adminid'] = $admin_id;
    $_SESSION['name'] = $name;
    header("Location: admin/dashboard.php");
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
          <h2>Admin Login</h2>
          <form method="post" role="form">
            <input type="email" required name="email" placeholder="E-mail" />
            <input type="password" required name="password" placeholder="Password" />
            <div class="chcbox">
              <input type="checkbox" id="chcbox" name="chcbox" />
              <label for="chcbox">Remember me</label>
            </div>
            <input type="submit" id="submit" name="login" value="Login" />
            <p style="color:<?= $color ?>; font-size:1rem;padding-top:.5rem"><?= $msg ?></p>


            <span>
              ...or login as an <a href="userlogin.php">User</a>
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