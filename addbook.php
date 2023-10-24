<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

if (isset($_POST['submit'])) {

    $title = sanitize(trim($_POST['title']));
    $author = sanitize(trim($_POST['author']));
    $label = sanitize(trim($_POST['label']));
    $bookCopies = sanitize(trim($_POST['bookCopies']));
    $publisher = sanitize(trim($_POST['publisher']));
    $select = sanitize(trim($_POST['select']));
    $category = sanitize(trim($_POST['category']));
    $call = sanitize(trim($_POST['call']));

    $sql = "INSERT INTO books(bookTitle, author, ISBN, bookCopies, publisherName, available, categories, callNumber)
                 values ('$title','$author','$label','$bookCopies','$publisher','$select','$category','$call')";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>alert('New Book has been added ');
					location.href ='bookstable.php';
					</script>";
    } else {
        echo "<script>alert('Book not added!');
					</script>";
    }
}

if (isset($_FILES['cover']['name']) && !empty($_FILES['cover']['name'])) {
    $cover_name = $_FILES['cover']['name'];
    $cover_tmp = $_FILES['cover']['tmp_name'];
    $cover_extension = pathinfo($cover_name, PATHINFO_EXTENSION);

    // Lokasi penyimpanan gambar sampul buku
    $cover_destination = "covers/" . $title . "." . $cover_extension;

    // Pindahkan file yang diunggah ke lokasi penyimpanan
    if (move_uploaded_file($cover_tmp, $cover_destination)) {
        // File berhasil diunggah, lanjutkan dengan penyimpanan informasi buku ke database
        $sql = "INSERT INTO books (bookTitle, author, ISBN, bookCopies, publisherName, available, categories, callNumber, cover)
                VALUES ('$title', '$author', '$label', '$bookCopies', '$publisher', '$select', '$category', '$call', '$cover_destination')";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script>alert('New Book has been added');
                    location.href = 'bookstable.php';
                  </script>";
        } else {
            echo "<script>alert('Book not added!');
                  </script>";
        }
    } else {
        echo "<script>alert('Failed to upload cover image.');
              </script>";
    }
} else {
    echo "<script>alert('Silahkan tambah buku yang di inginkan.');
          </script>";
}

?>


<div class="container">
    <?php include "includes/nav.php"; ?>

    <div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 20px">
        <div class="jumbotron login2 col-lg-10 col-md-11 col-sm-12 col-xs-12">

            <p class="page-header" style="text-align: center">Tambah Buku</p>

            <div class="container">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" action="addbook.php" method="post">
                    <div class="form-group">
                        <label for="Title" class="col-sm-2 control-label">Judul Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" placeholder="Enter Title" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Author" class="col-sm-2 control-label">Penulis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="author" placeholder="Enter Author" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ISBN" class="col-sm-2 control-label">Tanggal Terbit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="label" placeholder="Enter ISBN" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Book Copies" class="col-sm-2 control-label">Buku Tersisa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="bookCopies" placeholder="Enter BOOK COPIES" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Publisher" class="col-sm-2 control-label">Nama Penerbit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="publisher" placeholder="Enter Publisher" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">Tersedia</label>
                        <div class="col-sm-10">
                            <select custom-select custom-select-lg name="select" required>
                                <option>SELECT</option>
                                <option>YES</option>
                                <option>NO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Publisher" class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="category" placeholder="Enter Category" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Publisher" class="col-sm-2 control-label">ID Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="call" placeholder="Enter Phone number" id="password" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Cover" class="col-sm-2 control-label">Sampul Buku</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="cover" id="cover" accept="image/*" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button name="submit" class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info" style="font-size:15px;">
                                Tambah Buku
                            </button>

                        </div>
                    </div>




                </form>
            </div>
        </div>

    </div>




    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            var input = document.getElementById('title').focus();
        }
    </script>
    </body>

    </html>