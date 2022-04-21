<?php

session_start();
if (isset($_SESSION['userid']) != 1 || isset($_SESSION['adminid']) == 1) {
  header("Location: index.php");
}

include "includes/header.php";
$msg = "";
$color = "red";

include "includes/config.php";
if (!$con) {
  $msg = "Connection problem occured with database!";
}

$user_id = $_SESSION['userid'];
$query = "SELECT StudentId, FullName, EmailId,Status,RegDate FROM `tblstudents` WHERE id = '" . $user_id . "'";

$run_query = mysqli_query($con, $query);
$rows_fetched = mysqli_num_rows($run_query);
$fetch = mysqli_fetch_assoc($run_query);


$std_id = $fetch['StudentId'];
$FullName = $fetch['FullName'];
$EmailId = $fetch['EmailId'];
$Status = $fetch['Status'] == 1 ? 'Active' : 'Inactive';
$color = $fetch['Status'] == 1 ? 'green' : 'red';
$RegDate = $fetch['RegDate'];


$name = trim(explode(" ", $FullName)[0]);
$surname = trim(explode(" ", $FullName)[1]);
if ($rows_fetched == 0) {
  $msg = "User not Found";
}







if (isset($_POST['submit'])) {
  $newName = ($_POST['name']) == null ? $name : $_POST['name'];
  $newSurname = ($_POST['surname']) == null ? $surname : $_POST['surname'];
  $newFullName = $newName . ' ' . $newSurname;
  $newEmail = ($_POST['email']) == null ? $EmailId : $_POST['email'];
  $query = "UPDATE `tblstudents` SET `FullName` = '{$newFullName}',`EmailId` = '{$newEmail}' WHERE `tblstudents`.`id` = {$user_id} ";

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
              <b>Student Id: </b>
              <span><?= $std_id ?></span>
            </div>
            <div class="pad-row">
              <b>Name: </b>
              <span><?= $name ?></span>
            </div>
            <div class="pad-row">
              <b>Surname: </b>
              <span><?= $surname ?></span>
            </div>
            <div class="pad-row">
              <b>E-mail: </b>
              <span><?= $EmailId ?></span>
            </div>
            <div class="pad-row">
              <b>Registration Time: </b>
              <span><?= $RegDate ?></span>
            </div>
            <div class="pad-row">
              <b>Profile Status: </b>
              <span class="<?= $color ?>"><?= $Status ?></span>
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
include "includes/footer.php";
?>