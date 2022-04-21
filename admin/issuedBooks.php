<?php

session_start();
if (isset($_SESSION['userid']) || !isset($_SESSION['adminid'])) {
  header("Location: ../index.php");
}
include "../includes/header.php";
?>
<main>
  <div class="gap"></div>
  <section>
    <div class="myContainer">
      <div class="bookshelf">
        <h3>Issued Books</h3>
        <table class="myBooks">
          <thead>
            <tr>
              <th>No</th>
              <th>Std name</th>
              <th>Book Name</th>
              <th>ISBN</th>
              <th>Issued date</th>
              <th>Return date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="adminBooks">
            <tr>
              <td>1</td>
              <td>Cek</td>
              <td>php</td>
              <td>123215</td>
              <td>21.02.2022</td>
              <td>21.02.2022</td>
              <td>
                <button class="btn btn-success mb-2">
                  <a href="#">Details</a>
                </button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>John</td>
              <td>java</td>
              <td>123215</td>
              <td>01.12.2022</td>
              <td>21.02.2022</td>
              <td>
                <button class="btn btn-success mb-2">
                  <a href="#">Details</a>
                </button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Cek</td>
              <td>php</td>
              <td>123215</td>
              <td>21.02.2022</td>
              <td>21.02.2022</td>
              <td>
                <button class="btn btn-success mb-2">
                  <a href="#">Details</a>
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
include "../includes/footer.php";
?>