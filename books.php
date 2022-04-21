<?php

session_start();
if (isset($_SESSION['adminid']) == 1) {
  unset($_SESSION['adminid']);
}
$msg = "";
$color = "red";

include "includes/config.php";
if (!$con) {
  $msg = "Connection problem occured with database!";
}


include "includes/header.php";

?>
<main>
  <section class="height-95">
    <div class="myContainer" style="margin-top: 1.5rem;">
      <div class="flex space-btw head-books ">
        <h1>All Books</h1>

        <div class="search-container">
          <select name="filter" id="filter">
            <option value="author">Author</option>
            <option value="Book Name">Book Name</option>
          </select>
          <input type="text" placeholder="Search.." name="search" />
        </div>
      </div>
      <table id="allBooks">
        <thead>
          <tr>
            <th></th>
            <th>Image</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT BookName, AuthorName, bookImage,isIssued FROM `tblbooks` ";
          $count = 1;
          $run_query = mysqli_query($con, $query);
          $rows_fetched = mysqli_num_rows($run_query);
          $fetch = mysqli_fetch_all($run_query);
          if ($rows_fetched == 0) {
            $msg = "There is no books...";
          } else {
            foreach ($fetch as $a) {
              $status = $a[3] == 1 ? 'Refde' : 'Refde yoxdur';
              $color = $a[3] == 1 ? 'green' : 'red';

          ?>

              <tr>
                <td><?= $count ?></td>
                <td>
                  <div class="img"><img src="assets/images/<?= $a[2] ?>" alt="" /></div>
                </td>
                <td><?= $a[0] ?></td>
                <td><?= $a[1] ?></td>
                <td class="<?= $color ?>"><?= $status ?></td>
              </tr>
          <?php
              $count++;
            }
          }
          ?>

        </tbody>
      </table>
    </div>
  </section>
</main>

<?php
include "includes/footer.php";
?>