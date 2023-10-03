<?php

// session_destroy();
// if (!(isset($_SESSION['auth']) && $_SESSION['auth'] === true)) {
// 	header("Location: admin.php?access=false");
// 	exit();
// }
// else {
// 
// }
if (isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];
}

if (isset($_SESSION['student-name'])) {
    $student = $_SESSION['student-name'];
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/navbar2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="flickity/flickity.js"></script>
</head>

<body>
    <header id="nav-menu" aria-label="navigation bar">
        <div class="container-navbar">
            <div class="nav-start">
                <a class="logo" href="/">
                    <img src="https://i.ibb.co/brcd6Jd/sea-books-logo-modified.png" width="45" height="45" alt="Inc Logo" />
                </a>
                <nav class="menu">
                    <ul class="menu-bar">
                        <a href="index.php" class="nav-link dropdown-btn" style="font-size: 20px;">
                            Beranda
                        </a>
                        <?php if (isset($student)) { ?>
                            <li>
                                <button class="nav-link dropdown-btn" data-dropdown="dropdown-admin" aria-haspopup="true" aria-expanded="false" aria-label="discover" style="font-size: 20px;">
                                    Akun
                                    <i class="bx bx-chevron-down" aria-hidden="true"></i>
                                </button>
                                <div id="dropdown-admin" class="dropdown">
                                    <ul role="menu" style="font-size: 13px;">
                                        <li>
                                            <span class="dropdown-link-title">Sub Menu</span>
                                        </li>
                                        <li role="menuitem">
                                            <a class="dropdown-link" href="profile.php">Profile Siswa</a>
                                        </li>
                                        <li role="menuitem">
                                            <a class="dropdown-link" href="profile.php">Profile Guru</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <button class="nav-link dropdown-btn" data-dropdown="dropdown-admin2" aria-haspopup="true" aria-expanded="false" aria-label="discover" style="font-size: 20px;">
                                    Pinjam Buku
                                    <i class="bx bx-chevron-down" aria-hidden="true"></i>
                                </button>
                                <div id="dropdown-admin2" class="dropdown">
                                    <ul role="menu" style="font-size: 13px;">
                                        <li>
                                            <span class="dropdown-link-title">Kategori</span>
                                        </li>
                                        <li role="menuitem">
                                            <a class="dropdown-link" href="borrowedbooks.php">Fiksi</a>
                                        </li>
                                        <li role="menuitem">
                                            <a class="dropdown-link" href="borrowedbooks.php">Mata Pelajaran</a>
                                        </li>
                                        <li role="menuitem">
                                            <a class="dropdown-link" href="borrowedbooks.php">Sejarah</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- <li c1lass="active"><a href="admin.php">Home</a></li>
                            <li><a href="bookstable.php">Books</a></li>
                            <li><a href="users.php">Admins</a></li>
                            <li><a href="viewstudents.php">Students</a></li>
                            <li><a href="borrowedbooks.php">Borrowed books</a></li>
                            <li><a href="fines.php">Fines</a></li> -->
                        <?php } ?>
                        <li>
                            <button class="nav-link dropdown-btn" data-dropdown="dropdown2" aria-haspopup="true" aria-expanded="false" aria-label="discover" style="font-size: 20px;">
                                Profil
                                <i class="bx bx-chevron-down" aria-hidden="true"></i>
                            </button>
                            <div id="dropdown2" class="dropdown">
                                <ul role="menu" style="font-size: 13px;">
                                    <li>
                                        <span class="dropdown-link-title">Sub Menu</span>
                                    </li>
                                    <li role="menuitem">
                                        <a class="dropdown-link" href="../Sea-Books-LSP/organisation.php">Struktur Organisasi</a>
                                    </li>
                                    <li role="menuitem">
                                        <a class="dropdown-link" href="../Sea-Books-LSP/rule.php">Panduan Perpustakaan</a>
                                    </li>
                                </ul>
                                <ul role="menu" style="font-size: 13px;">
                                    <li>
                                        <span class="dropdown-link-title">Keterangan</span>
                                    </li>
                                    <li role="menuitem">
                                        <a class="dropdown-link" href="../Sea-Books-LSP/tata-tertib.php">Tata Tertib</a>
                                    </li>
                                    <li role="menuitem">
                                        <a class="dropdown-link" href="../Sea-Books-LSP/faq.php">FAQ</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <button class="nav-link dropdown-btn" data-dropdown="dropdown0" aria-haspopup="true" aria-expanded="false" aria-label="browse" style="font-size: 20px;">
                                Aktifitas
                                <i class="bx bx-chevron-down" aria-hidden="true"></i>
                            </button>
                            <div id="dropdown0" class="dropdown">
                                <ul role="menu" style="font-size: 13px;">
                                    <li class="dropdown-title">
                                        <span class="dropdown-link-title">Aktifitas Perpustakaan</span>
                                    </li>
                                    <li role="menuitem">
                                        <a class="dropdown-link" href="../Sea-Books-LSP/gallery.html">
                                            Geleri
                                        </a>
                                    </li>
                                    <li role="menuitem">
                                        <a class="dropdown-link" href="#">
                                            Berita
                                        </a>
                                    </li>
                                    <li role="menuitem">
                                        <a class="dropdown-link" href="#">
                                            Pengumuman
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="nav-end">
                <div class="right-container">
                    <form class="search" role="search">
                        <input type="search" name="search" placeholder="Search" />
                        <i class="bx bx-search" aria-hidden="true"></i>
                    </form>
                    <a href="../Sea-Books-LSP/login.php">
                        <img src="https://i.ibb.co/D8Gphx6/image-login.png" width="45" height="45" alt="user image" />
                    </a>
                </div>

                <button id="hamburger" aria-label="hamburger" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-menu" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </header>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"> </script>
    <script type="text/javascript" src="js/script.js"></script>
    <?php if (isset($alert_user)) { ?>
        <script type="text/javascript">
            swal("Oops...", "You are not allowed to view this page directly...!", "error");
        </script>
    <?php } ?>
</body>

</html>


<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
                <span class="sr-only">:</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Library Management System</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example">
            <ul class="nav navbar-nav">
                <?php if (isset($admin)) { ?>
                    <li class="active"><a href="admin.php">Home</a></li>
                    <li><a href="bookstable.php">Books</a></li>
                    <li><a href="users.php">Admins</a></li>
                    <li><a href="viewstudents.php">Students</a></li>
                    <li><a href="borrowedbooks.php">Borrowed books</a></li>
                    <li><a href="fines.php">Fines</a></li>
                <?php } ?>
                <?php if (isset($student)) { ?>
                    <li class="active"><a href="studentportal.php">Home</a></li>
                    <li><a href="profile.php">View Profile</a></li>
                    <li><a href="borrow-student.php">Borrow Books</a></li>
                    <li><a href="fine-student.php">Fines</a></li>
            </ul>
        <?php } ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    </div>
</nav> -->