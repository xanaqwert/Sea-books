<?php

require 'includes/db-inc.php';
session_start();
error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>bootstrap 5 image gallery with popup</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/gallery.css" rel="stylesheet">
</head>

<body>
    <?php include "includes/nav.php"; ?>
    <div class="port">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header text-center">
                        <h2>E-Book Gallery</h2>
                        <p>Galer Terbaru Dari Perpustakaan Offline Kami</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="gallery-item" data-bs-target="#popup1" data-bs-toggle="modal">
                        <img alt="Image 1" src="https://i.ibb.co/WfdW0KH/gallery-1.jpg" width="100%">
                        <div class="overlay">
                            <h3>Ruang Baca</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices, elit quis congue fringilla, elit nisi mollis mi, at egestas eros tortor ut leo.</p><a class="btn btn-primary" href="#">Perbesar Gambar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="gallery-item" data-bs-target="#popup2" data-bs-toggle="modal">
                        <img alt="Image 2" src="https://i.ibb.co/WfdW0KH/gallery-1.jpg" width="100%">
                        <div class="overlay">
                            <h3>Ruang Belajar</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices, elit quis congue fringilla, elit nisi mollis mi, at egestas eros tortor ut leo.</p><a class="btn btn-primary" href="#">Perbesar Gambar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="gallery-item" data-bs-target="#popup3" data-bs-toggle="modal">
                        <img alt="Image 3" src="https://i.ibb.co/WfdW0KH/gallery-1.jpg" width="100%">
                        <div class="overlay">
                            <h3>Peminjaman Buku</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices, elit quis congue fringilla, elit nisi mollis mi, at egestas eros tortor ut leo.</p><a class="btn btn-primary" href="#">Perbesar Gambar</a>
                        </div>
                    </div>
                </div>
                <!-- Span -->
                <span><br></span>
                <!-- Second Row -->
                <div class="col-lg-4 col-sm-12">
                    <div class="gallery-item" data-bs-target="#popup4" data-bs-toggle="modal">
                        <img alt="Image 1" src="https://i.ibb.co/WfdW0KH/gallery-1.jpg" width="100%">
                        <div class="overlay">
                            <h3>Ruang Baca</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices, elit quis congue fringilla, elit nisi mollis mi, at egestas eros tortor ut leo.</p><a class="btn btn-primary" href="#">Perbesar Gambar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="gallery-item" data-bs-target="#popup5" data-bs-toggle="modal">
                        <img alt="Image 2" src="https://i.ibb.co/WfdW0KH/gallery-1.jpg" width="100%">
                        <div class="overlay">
                            <h3>Ruang Belajar</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices, elit quis congue fringilla, elit nisi mollis mi, at egestas eros tortor ut leo.</p><a class="btn btn-primary" href="#">Perbesar Gambar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="gallery-item" data-bs-target="#popup6" data-bs-toggle="modal">
                        <img alt="Image 3" src="https://i.ibb.co/WfdW0KH/gallery-1.jpg" width="100%">
                        <div class="overlay">
                            <h3>Peminjaman Buku</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices, elit quis congue fringilla, elit nisi mollis mi, at egestas eros tortor ut leo.</p><a class="btn btn-primary" href="#">Perbesar Gambar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <span><br></span>
    </div><!-- Popup modals -->
    <div class="modal fade" id="popup1">
        <div class="modal-dialog">
            <div class="modal-content"><img alt="Image 1" src="https://i.ibb.co/WfdW0KH/gallery-1.jpg"></div>
        </div>
    </div>
    <div class="modal fade" id="popup2">
        <div class="modal-dialog">
            <div class="modal-content"><img alt="Image 2" src="https://i.ibb.co/WfdW0KH/gallery-1.jpg"></div>
        </div>
    </div>
    <div class="modal fade" id="popup3">
        <div class="modal-dialog">
            <div class="modal-content"><img alt="Image 3" src="https://i.ibb.co/WfdW0KH/gallery-1.jpg"></div>
        </div>
    </div>
    <div class="modal fade" id="popup4">
        <div class="modal-dialog">
            <div class="modal-content"><img alt="Image 1" src="https://i.ibb.co/WfdW0KH/gallery-1.jpg"></div>
        </div>
    </div>
    <div class="modal fade" id="popup5">
        <div class="modal-dialog">
            <div class="modal-content"><img alt="Image 2" src="https://i.ibb.co/WfdW0KH/gallery-1.jpg"></div>
        </div>
    </div>
    <div class="modal fade" id="popup6">
        <div class="modal-dialog">
            <div class="modal-content"><img alt="Image 3" src="https://i.ibb.co/WfdW0KH/gallery-1.jpg"></div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>