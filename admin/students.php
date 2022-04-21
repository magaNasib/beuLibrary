<?php

session_start();
if (isset($_SESSION['userid']) == 1 || isset($_SESSION['adminid']) != 1) {
  header("Location: ../index.php");
}

$msg = '';
$color = 'green';
include "includes/config.php";
if (!$con) {
  $msg = "Connection problem occured with database!";
}

if (isset($_GET['setStatus'])) {
  $id = intval($_GET['setStatus']);
  $query = "SELECT Status FROM `tblstudents`  WHERE `tblstudents`.`id` = {$id} ";
  $run_query = mysqli_query($con, $query);
  $rows_fetched = mysqli_num_rows($run_query);
  $fetch = mysqli_fetch_all($run_query);
  $status = $fetch[0][0] == 1 ? 0 : 1;

  $sql = "UPDATE `tblstudents` SET `Status` = {$status} WHERE `tblstudents`.`id` = {$id} ";
  if (mysqli_query($con, $sql)) {

    header("Location: students.php");
  } else {
    $msg = "Couldn't set";
  }
}

include "../includes/header.php";

?>
<main>
  <div class="gap"></div>
  <section>
    <div class="myContainer">
      <div class="bookshelf">
        <h3>All Students</h3>
        <table class="myBooks">
          <thead>
            <tr>
              <th>No</th>
              <th>Std Id</th>
              <th>Std Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="adminBooks">
            <?php
            $query = "SELECT StudentId, FullName, EmailId,Status,id FROM `tblstudents` ";

            $run_query = mysqli_query($con, $query);
            $rows_fetched = mysqli_num_rows($run_query);
            $fetch = mysqli_fetch_all($run_query);
            $count = 1;
            if ($rows_fetched == 0) {
              $msg = "There is no students...";
            } else {
              foreach ($fetch as $a) {

                $status = $a[3] == 1 ? 'Active' : 'Inactive';
                $color = $a[3] == 1 ? 'green' : 'red';

            ?>
                <p><?= $msg ?></p>
                <tr>
                  <td><?= $count ?></td>
                  <td>
                    <?= $a[0] ?>
                  </td>
                  <td><?= $a[1] ?></td>
                  <td><?= $a[2] ?></td>

                  <td class="<?= $color ?>"><?= $status ?></td>
                  <td>
                    <button class="btn btn-<?= $a[3] == 1 ? 'danger' : 'warning' ?> mb-2">
                      <a href="students.php?setStatus=<?= $a[4] ?>" onclick="return confirm('Are you sure?')" class="confirm-btn"><?= $a[3] == 1 ? 'Inactive' : 'Active' ?></a>
                    </button>
                    <button class=" btn btn-success mb-2">
                      <a href="#">Details</a>
                    </button>
                  </td>
                </tr>
            <?php
                $count++;
              }
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>
<?php
include "../includes/footer.php";
?>