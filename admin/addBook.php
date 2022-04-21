<?php

session_start();
if (isset($_SESSION['userid']) == 1 || isset($_SESSION['adminid']) != 1) {
    header("Location: ../index.php");
}
$msg = '';

if (isset($_POST['add'])) {

    $bookName = trim($_POST['bookName']);
    $authorName = trim($_POST['authorName']);
    $isbn = trim($_POST['isbn']);
    $bookCount = trim($_POST['bookCount']);
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../assets/images/" . $filename;
    $filename = $filename == null ? "book.jpg" : $filename;
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }
    include "includes/config.php";
    $query = "SELECT COUNT(*) as count from tblbooks where ISBNNumber = '{$isbn}';";
    $run = mysqli_query($con, $query);
    //$get_row = mysqli_fetch_array($run);
    $get_row = mysqli_fetch_assoc($run);
    if ($get_row['count'] != 0) {
        $msg = "This book already registered!";
    } else {

        $reg_query = "INSERT INTO `tblbooks` (BookName,AuthorName, ISBNNumber, BookCount,bookImage,RegDate) VALUES(
                                    '{$bookName}','{$authorName}', '{$isbn}', '{$bookCount}','{$filename}', current_timestamp());";
        if (mysqli_query($con, $reg_query)) {
            $msg = "Successfully registered";
            header("Location: manageBooks.php");
        } else
            $msg = "Could not add";
    }
}
include "../includes/header.php";
?>
<main>
    <div class="gap"></div>
    <section>
        <div class="myContainer">
            <div class="bookshelf">
                <h2>Add Book</h2>
                <p></p>
                <form class="addBook-from" method="post" role="form" enctype="multipart/form-data">

                    <div class="form-div">
                        <div class="form-group">
                            <label for="bookName">Book Name</label>
                            <input type="text" id="bookName" required name="bookName">
                        </div>
                        <div class="form-group">

                            <label for="authorName">Author Name</label>
                            <input type="text" id="authorName" required name="authorName">
                        </div>
                        <div class="form-group">

                            <label for="isbn">ISBNNumber</label>
                            <input type="text" id="isbn" required name="isbn">
                        </div>
                        <div class="form-group">

                            <label for="bookCount">Book Count</label>
                            <input type="number" id="bookCount" name="bookCount" min="0">
                        </div>
                        <div class="form-group">

                            <label for="bookCount">Upload Book Image</label>
                            <input type="file" accept="image/*" name="uploadfile" class="" />
                        </div>
                        <p class="red"><?= $msg ?></p>
                        <div class=" text-right">
                            <input type="reset" value="reset" class="btn btn-danger">
                            <input type="submit" value="ADD" name="add" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<?php
include "../includes/footer.php";
?>