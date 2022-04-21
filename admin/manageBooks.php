<?php

session_start();
if (isset($_SESSION['userid']) == 1 || isset($_SESSION['adminid']) != 1) {
  header("Location: ../index.php");
}

$msg = '';
include "includes/config.php";
if (!$con) {
  $msg = "Connection problem occured with database!";
}
if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $sql = "DELETE FROM `tblbooks` WHERE `tblbooks`.`id` = {$id}";
  if (mysqli_query($con, $sql)) {
    $msg = "Successfully Deleted";
    header("Location: manageBooks.php");
  } else {
    $msg = "Couldn't delete";
  }
}

include "../includes/header.php";
?>

<main>
  <div class="gap"></div>
  <section class="height-95">
    <div class="myContainer">
      <div class="bookshelf">
        <h3>All Books</h3>
        <table class="myBooks">
          <thead>
            <tr>
              <th>No</th>
              <th>Book</th>
              <th>Book Name</th>
              <th>Author</th>
              <th>ISBN</th>
              <th>Count</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="adminBooks">
            <?php
            $query = "SELECT bookImage, AuthorName, ISBNNumber,BookCount,id,BookName FROM `tblbooks` ";
            $count = 1;
            $run_query = mysqli_query($con, $query);
            $rows_fetched = mysqli_num_rows($run_query);
            $fetch = mysqli_fetch_all($run_query);
            if ($rows_fetched == 0) {
              $msg = "There is no books...";

            ?>
              <p><?= $msg ?></p><?php
                              } else {

                                foreach ($fetch as $a) {

                                ?>
                <tr>
                  <td><?= $count ?></td>
                  <td>
                    <div class="img"><img src="../assets/images/<?= $a[0] ?>" alt="" /></div>
                  </td>
                  <td><?= $a[5] ?></td>
                  <td><?= $a[1] ?></td>
                  <td><?= $a[2] ?></td>
                  <td class="<?= $color ?>"><?= $a[3] ?></td>
                  <td>
                    <button class="btn btn-danger mb-2">
                      <a href="manageBooks.php?del=<?= $a[4] ?>" onclick="return confirm('Are you sure you want to delete?');"" >Delete</a>
                    </button>
                    <button class=" btn btn-info mb-2">
                        <a href="#">Edit</a>
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