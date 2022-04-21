<?php

session_start();
if (isset($_SESSION['userid']) || !isset($_SESSION['adminid'])) {
  header("Location: ../index.php");
}

include "../includes/header.php";
$msg = "";
$color = "red";

include "includes/config.php";
if (!$con) {
  $msg = "Connection problem occured with database!";
}

$admin_id = $_SESSION['adminid'];
$query = "SELECT FullName, AdminEmail,UserName FROM `admin` WHERE id = '" . $admin_id . "'";

$run_query = mysqli_query($con, $query);
$rows_fetched = mysqli_num_rows($run_query);
$fetch = mysqli_fetch_assoc($run_query);


$FullName = $fetch['FullName'];
$EmailId = $fetch['AdminEmail'];
$UserName = $fetch['UserName'];


$name = trim(explode(" ", $FullName)[0]);
$surname = trim(explode(" ", $FullName)[1]);

if ($rows_fetched == 0) {
  $msg = "User not Found";
}


//for uptading
if (isset($_POST['submit'])) {
  $newName = ($_POST['name']) == null ? $name : $_POST['name'];
  $newSurname = ($_POST['surname']) == null ? $surname : $_POST['surname'];
  $newFullName = $newName . ' ' . $newSurname;
  $newEmail = ($_POST['email']) == null ? $EmailId : $_POST['email'];
  $query = "UPDATE `admin` SET `FullName` = '{$newFullName}',`AdminEmail` = '{$newEmail}' WHERE `admin`.`id` = {$admin_id} ";

  if (mysqli_query($con, $query)) {
    $color = 'green';
    $msg = 'Successfully Changed...';
    $_SESSION['name'] = $newName;
    echo ('<script>setTimeout(function(){ window.location="profile.php"; },1000)</script>');

    // header("Location: profile.php");
  } else {
    $color = 'red';
    $msg = 'Something went wrong...';
  }
}


?>
<main>
  <div class="gap"></div>
  <section class="height-95">
    <div class="myContainer">
      <div class="bookshelf flex mobile-column">
        <div class="left">
          <div class="">
            <div class="">
              <h4 class="">My Profile</h4>
            </div>
          </div>
          <div class="row p-2">

            <div class="pad-row">
              <b>FullName: </b>
              <span><?= $FullName ?></span>
            </div>
            <div class="pad-row">
              <b>Username: </b>
              <span><?= $UserName ?></span>
            </div>
            <div class="pad-row">
              <b>E-mail: </b>
              <span><?= $EmailId ?></span>
            </div>
          </div>
        </div>
        <div class="right login-div">
          <h4>Uptade your Information</h4>

          <form method="POST" role="form">
            <input type="text" placeholder="Name" name="name" />
            <input type="text" placeholder="Surname" name="surname" />
            <input type="text" placeholder="E-mail" name="email" />
            <p style="font-size: 1.3rem;" class="<?= $color ?>"><?= $msg ?></p>

            <input type="submit" id="submit" value="Uptade" name="submit" />
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
<?php
include "../includes/footer.php";
?>