<?php

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";
session_start();
error_reporting(E_ALL ^ E_NOTICE);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/navbar2.css">
    <link rel="stylesheet" href="css/organisation.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="flickity/flickity.js"></script>
</head>

<body>
    <?php include "includes/nav.php"; ?>
    <!-- header -->
    <!-- <header id="nav-menu" aria-label="navigation bar">
        <div class="container-navbar">
            <div class="nav-start">
                <a class="logo" href="/">
                    <img src="https://i.ibb.co/brcd6Jd/sea-books-logo-modified.png" width="45" height="45" alt="Inc Logo" />
                </a>
                <nav class="menu">
                    <ul class="menu-bar">
                        <li>
                            <a href="index.php" class="nav-link dropdown-btn" style="font-size: 20px;">
                                Beranda
                            </a>
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
                            <button class="nav-link dropdown-btn" data-dropdown="dropdown1" aria-haspopup="true" aria-expanded="false" aria-label="browse" style="font-size: 20px;">
                                Kategori
                                <i class="bx bx-chevron-down" aria-hidden="true"></i>
                            </button>
                            <div id="dropdown1" class="dropdown">
                                <ul role="menu" style="font-size: 13px;">
                                    <li class="dropdown-title">
                                        <span class="dropdown-link-title">Kategori Buku</span>
                                    </li>
                                    <li role="menuitem">
                                        <a class="dropdown-link" href="#">
                                            Buku Pelarajan
                                        </a>
                                    </li>
                                    <li role="menuitem">
                                        <a class="dropdown-link" href="#">
                                            Buku Fiksi
                                        </a>
                                    </li>
                                    <li role="menuitem">
                                        <a class="dropdown-link" href="#">
                                            Buku Biografi
                                        </a>
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
                                        <span class="dropdown-link-title">Kategori Buku</span>
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
    </header> -->

    <main>
        <div class="container">
            <div class="row">
                <div class="tree">
                    <ul>
                        <li> <a href="#"><img src="images/1.jpg"><span>Rifat Mpd <br> Kepala Sekolah</span></a>
                            <ul>
                                <li><a href="#"><img src="images/2.jpg"><span>Tachibana <br> Manager A</span></a>
                                    <ul>
                                        <li> <a href="#"><img src="images/3.jpg"><span>Sora <br> Pegawai A</span></a> </li>
                                        <li> <a href="#"><img src="images/4.jpg"><span>Bambang <br> Pegawai B</span></a> </li>
                                    </ul>
                                </li>
                                <li> <a href="#"><img src="images/5.jpg"><span>Sarah <br> Manager B</span></a>
                                    <ul>
                                        <li> <a href="#"><img src="images/6.jpg"><span>Endang <br> Pegawai A</span></a> </li>
                                        <li> <a href="#"><img src="images/7.jpg"><span>Marbung <br> Pegawai B</span></a> </li>
                                        <li> <a href="#"><img src="images/8.jpg"><span>Nurmin <br> Pegawai C</span></a> </li>
                                    </ul>
                                </li>
                                <li><a href="#"><img src="images/9.jpg"><span>Bamer <br> Manager C</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
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