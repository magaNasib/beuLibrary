<?php

session_start();
if (isset($_SESSION['userid']) || !isset($_SESSION['adminid'])) {
  header("Location: ../index.php");
}
if (isset($_POST['submit'])) {
  $msg = '';
  $color = 'green';
  include("includes/config.php");
  if (!$con) {
    $msg = "Connection problem occured with database!";
  }
  $oldpassword = md5($_POST['oldpass']);
  $password = md5($_POST['newPass']);
  $repass = md5($_POST['repass']);
  $id = intval($_SESSION['adminid']);

  $query = "SELECT Password FROM `admin`  WHERE `admin`.`id` = {$id} ";
  $run_query = mysqli_query($con, $query);
  $rows_fetched = mysqli_num_rows($run_query);
  $fetch = mysqli_fetch_all($run_query);

  if ($fetch[0][0] == $oldpassword) { //Checking old pass correct or not
    if ($oldpassword != $password) { //checking new pass is same with old or not
      if ($password == $repass) { //checking new password match each other or not
        $query = "UPDATE `admin` SET `Password` = '{$password}'  WHERE `admin`.`id` = {$id} ";


        if (mysqli_query($con, $query)) {
          $color = 'green';
          $msg = 'Successfully Changed...';

          echo ('<script>setTimeout(function(){ window.location="profile.php"; },1000)</script>');
        } else {
          $color = 'red';
          $msg = 'Something went wrong...';
        }
      } else {
        $color = 'red';
        $msg = "Passwords don't match...";
      }
    } else {

      $color = 'red';
      $msg = "New Password can't be your old password...";
    }
  } else {
    $color = 'red';
    $msg = 'Old password is not correct...';
  }
}

include "../includes/header.php";
?>
<main>
  <div class="gap"></div>
  <section class="height-95">
    <div class="myContainer">
      <div class="bookshelf flex center mobile-column">
        <div>
          <div class="login-div">
            <h2>Change Password for Admin</h2>
            <form method="post" role="form">
              <input type="password" required name="oldpass" placeholder="Old Password" />
              <input type="password" required name="newPass" placeholder="New Password" />
              <input type="password" required name="repass" placeholder="Re-new-Password" />
              <p style="font-size: 1.3rem;" class="<?= $color ?>"><?= $msg ?></p>
              <input type="submit" id="submit" name="submit" value="Change" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php
include "../includes/footer.php";
?>