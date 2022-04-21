<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BeuLib</title>
    <link rel="stylesheet" href="assets//css/style.css" />
    <link rel="stylesheet" href="../admin/assets/css/font-awesome.css" />
    <link rel="stylesheet" href="../admin/assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <link rel="shortcut icon" href="assets/images/logohead.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://f   onts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet" />
</head>

<body>

    <header>
        <div class="header-div">
            <div class="flex space-btw relative">


                <?php
                if (isset($_SESSION['userid']) == 1) {
                ?>

                    <!-- if a user logined -->
                    <div class="logo">
                        <a href="index.php">
                            <picture>
                                <source class="logo-mobile" media="(max-width:476px)" srcset="assets/images/logohead.png" />
                                <img src="assets/images/logo.png" />
                            </picture>
                        </a>
                    </div>
                    <div class="myNavbar">
                        <nav>
                            <ul class="flex">
                                <li class="">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="index.php#about">About</a>
                                </li>
                                <li>
                                    <a href="books.php">Books</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="user-info" onclick="profileToggle()">
                        <a href="#"><?= $_SESSION['name'] ?></a>
                        <a href="#">
                            <div class="profile-pic">
                                <img src="assets/images/user2.png" alt="" />
                            </div>
                        </a>
                        <a href="#"> <i class="fa-solid fa-caret-down"></i></a>

                        <div class="popup" id="popupProfile">
                            <ul>
                                <li class="">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="index.php#about">About</a>
                                </li>
                                <li>
                                    <a href="books.php">Books</a>
                                </li>
                                <li>
                                    <a href="dashboard.php">Dashboard</a>
                                </li>
                                <li>
                                    <a href="profile.php">Profile</a>
                                </li>
                                <li>
                                    <a href="changePass.php">Change Password</a>
                                </li>
                                <li id="logout">
                                    <a href="logout.php">Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="popup" id="popupNav">
                        <nav>
                            <ul class="">
                                <li class="">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="books.php">Books</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- <div class="menu-icon" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </div> -->
            </div>
        </div>



    <?php } elseif (isset($_SESSION['adminid']) == 1) { ?>
        <div class="logo">
            <a href="#">
                <picture>
                    <source class="logo-mobile" media="(max-width:476px)" srcset="../assets/images/logohead.png" />
                    <img src="../assets/images/logo.png" />
                </picture>
            </a>
        </div>
        <div class="myNavbar">
            <nav>
                <ul class="flex">
                    <li class="">
                        <a href="../admin/dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <select name="book" onchange="location = this.value;">
                            <option value="none" selected hidden disabled>Books</option>
                            <option value="../admin/addBook.php">Add Books</option>
                            <option value="../admin/manageBooks.php">Manage Books</option>
                        </select>
                    </li>
                    <li>
                        <select name="student" onchange="location = this.value;">
                            <option value="none" selected hidden disabled>
                                Students
                            </option>
                            <option value="../admin/addStudent.php">Add Students</option>
                            <option value="../admin/students.php">Manage Students</option>
                        </select>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="user-info" onclick="profileToggle()">
            <a href="#"><?= $_SESSION['name'] ?></a>
            <a href="#">
                <div class="profile-pic">
                    <img src="../assets/images/user2.png" alt="" />
                </div>
            </a>
            <a href="#"> <i class="fa-solid fa-caret-down"></i></a>

            <div class="popup" id="popupProfile">
                <ul>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <select name="book" onchange="location = this.value;">
                            <option value="none" selected hidden disabled>Books</option>
                            <option value="../admin/addBook.php">Add Books</option>
                            <option value="../admin/manageBooks.php">Manage Books</option>
                        </select>
                    </li>
                    <li>
                        <select name="student" onchange="location = this.value;">
                            <option value="none" selected hidden disabled>
                                Students
                            </option>
                            <option value="../admin/addStudent.php">Add Students</option>
                            <option value="../admin/students.php">Manage Students</option>
                        </select>
                    </li>
                    <li>
                        <a href="../admin/dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="../admin/profile.php">Profile</a>
                    </li>
                    <li>
                        <a href="../admin/changePass.php">Change Password </a>
                    </li>
                    <li id="logout">
                        <a href="../admin/logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="popup" id="popupNav">
            <nav>
                <ul class="">
                    <li class="">
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="books.html">Books</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- <div class="menu-icon" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </div> -->
        </div>
        </div>

    <?php } else { ?>

        <div class="logo">
            <a href="index.php">
                <picture>
                    <source class="logo-mobile" media="(max-width:476px)" srcset="assets/images/logohead.png" />
                    <img src="assets/images/logo.png" />
                </picture>
            </a>
        </div>
        <div class="myNavbar">
            <nav>
                <ul class="flex">
                    <li class="">
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="index.php#about">About</a>
                    </li>
                    <li>
                        <a href="books.php">Books</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="btns">
            <a href="userlogin.php">Login</a>
            <a href="signup.php" class="signup">Signup</a>
        </div>

        <div class="popup" id="popupNav">
            <nav>
                <ul class="">
                    <li class="">
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="books.php">Books</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="menu-icon" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        </div>
        </div>

    <?php } ?>
    </header>