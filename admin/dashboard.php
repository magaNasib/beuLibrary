<?php
session_start();
if (isset($_SESSION['userid']) == 1 || isset($_SESSION['adminid']) != 1) {
  header("Location: ../index.php");
}
include "../includes/header.php";
?>
<main>
  <div class="gap"></div>
  <section class="height-95">
    <div class="myContainer">
      <div class="bookshelf">
        <h3>Admin Dashboard</h3>
        <hr />
        <div class="flex space-btw dashboardDiv mobile-column">
          <div class="card text-success">
            <a href="manageBooks.php">
              <div class="text-center">
                <i class="fa fa-book fa-5x"></i>
                <h3>11</h3>
                Books Listed
              </div>
            </a>
          </div>
          <div class="card text-danger">
            <a href="issuedBooks.html">
              <div class="text-center">
                <i class="fa fa-recycle fa-5x"></i>
                <h3>11</h3>
                Books Not Returned
              </div>
            </a>
          </div>
          <div class="card text-info">
            <a href="students.php">
              <div class="text-center">
                <i class="fa fa-users fa-5x"></i>
                <h3>11</h3>
                Registered Users
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php
include "../includes/footer.php";
?>