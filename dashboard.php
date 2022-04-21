<?php
session_start();
if (isset($_SESSION['userid']) != 1 || isset($_SESSION['adminid']) == 1) {
  header("Location: index.php");
}
include "includes/header.php";
?>
<main>
  <div class="gap"></div>
  <section class="height-95">
    <div class="myContainer">
      <div class="bookshelf">
        <h3>My Books</h3>
        <table class="myBooks">
          <thead>
            <tr>
              <th>No</th>
              <th>Book</th>
              <th>Taken time</th>
              <th>Return time</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>
                <div class="img">
                  <img src="assets/images/c2.jpg" alt="" />
                </div>
              </td>
              <td>2 mart</td>
              <td>2 aprel</td>
              <td>
                <button class="btn btn-success">
                  <a href="#">Vaxti artir</a>
                </button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>
                <div class="img">
                  <img src="assets/images/c1.jpg" alt="" />
                </div>
              </td>
              <td>2 mart</td>
              <td>2 aprel</td>
              <td>
                <button class="btn btn-success">
                  <a href="#">Vaxti artir</a>
                </button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>
                <div class="img">
                  <img src="assets/images/c4.jpg" alt="" />
                </div>
              </td>
              <td>2 mart</td>
              <td>2 aprel</td>
              <td>
                <button class="btn btn-success">
                  <a href="#">Vaxti artir</a>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>
<?php
include "includes/footer.php";
?>