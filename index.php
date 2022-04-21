<?php
session_start();
if (isset($_SESSION['adminid']) === true) {
  unset($_SESSION["adminid"]);
}
include "includes/header.php";
?>

<div class="gap"></div>
<main>
  <div class="bg-pic"></div>
  <button onclick="topFunction()" id="myBtn" title="Go to top">
    <img src="assets/images/icons8-up-24.png" alt="" />
  </button>
  <div class="main">
    <div class="myContainer height-100 flex center col-direct">
      <div class="center-main">
        <h1>Baku Engineering University Library</h1>
        <p>
          Open Library is an open, editable library catalog, building
          towards a web page for every book ever published.
          <a href="#">More</a>
        </p>
      </div>
      <?php

      if (!isset($_SESSION['userid'])) {
      ?>
        <div class="btns">
          <a href="userlogin.php">Login</a>
          <a href="signup.php" class="signup">Signup</a>

        </div> <?php } ?>
    </div>
  </div>

  <section id="benefit">
    <div class="myContainer">
      <div class="line-center"></div>
      <h2 class="align-center">Benefits</h2>
      <div class="benefits flex space-btw">
        <div class="benefit-item">
          <div class="left-img">
            <img src="assets/images/read.png" alt="" />
          </div>
          <div class="content">
            <h3>Read Free Library Books Online</h3>
            <p>
              Millions of books available through Controlled Digital Lending
            </p>
          </div>
        </div>
        <div class="benefit-item">
          <div class="left-img">
            <img src="assets/images/track.png" alt="" />
          </div>
          <div class="content">
            <h3>Keep Track of your Favorite Books</h3>
            <p>Organize your Books using Lists & the Reading Log</p>
          </div>
        </div>
        <div class="benefit-item">
          <div class="left-img">
            <img src="assets/images/fulltext.png" alt="" />
          </div>
          <div class="content">
            <h3>Try Fulltext Search</h3>
            <p>
              Find matching results within the text of millions of books.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="books">
    <div class="myContainer">
      <div class="line-center"></div>

      <h2 class="align-center">Books</h2>
      <div class="bookshelf">
        <h3>Classic Books</h3>
        <div class="books-div">
          <div class="book-item">
            <div class="bookimg">
              <img src="assets/images/c1.jpg" alt="" />
            </div>
            <div>
              <button>Borrow</button>
            </div>
          </div>
          <div class="book-item">
            <div class="bookimg">
              <img src="assets/images/c5.jpg" alt="" />
            </div>
            <div>
              <button>Borrow</button>
            </div>
          </div>
          <div class="book-item">
            <div class="bookimg">
              <img src="assets/images/c2.jpg" alt="" />
            </div>
            <div>
              <button>Borrow</button>
            </div>
          </div>
          <div class="book-item">
            <div class="bookimg">
              <img src="assets/images/c6.jpg" alt="" />
            </div>
            <div>
              <button>Borrow</button>
            </div>
          </div>
          <div class="book-item">
            <div class="bookimg">
              <img src="assets/images/c4.jpg" alt="" />
            </div>
            <div>
              <button>Borrow</button>
            </div>
          </div>
        </div>
      </div>
      <div class="bookshelf">
        <h3>Romance</h3>
        <div class="books-div">
          <div class="book-item">
            <div class="bookimg">
              <img src="assets/images/c2.jpg" alt="" />
            </div>
            <div>
              <button>Borrow</button>
            </div>
          </div>
          <div class="book-item">
            <div class="bookimg">
              <img src="assets/images/c3.jpg" alt="" />
            </div>
            <div>
              <button>Borrow</button>
            </div>
          </div>
          <div class="book-item">
            <div class="bookimg">
              <img src="assets/images/c4.jpg" alt="" />
            </div>
            <div>
              <button>Borrow</button>
            </div>
          </div>
          <div class="book-item">
            <div class="bookimg">
              <img src="assets/images/c5.jpg" alt="" />
            </div>
            <div>
              <button>Borrow</button>
            </div>
          </div>
          <div class="book-item">
            <div class="bookimg">
              <img src="assets/images/c1.jpg" alt="" />
            </div>
            <div>
              <button>Borrow</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="about">
    <div class="line-center"></div>
    <h2 class="align-center">About Us</h2>
  </section>
  <section class="about flex">

    <div class="left">
      <img src="assets/images/lib.jpg" alt="">
    </div>
    <div class="right">

      <h3>Baku Engineering University Library</h3>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora odit voluptates nobis dicta at ullam accusantium, dolorum culpa eum id aliquid officiis consequatur recusandae ipsum repellat inventore magnam molestias sint?
    </div>
  </section>
  <section></section>
</main>
<?php
include "includes/footer.php";
?>