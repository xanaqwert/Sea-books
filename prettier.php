<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include 'includes/header.php';

if (isset($_POST['del'])) {
    $id = sanitize(trim($_POST['id']));
    $sql_del = "DELETE FROM books WHERE BookId = $id";
    $error = false;
    $result = mysqli_query($conn, $sql_del);
    if ($result) {
        $error = true;
    }
}

$updated = false; // Initialize the variable to track if the update was successful

if (isset($_POST['update'])) {
    $bookId = sanitize(trim($_POST['bookId']));
    $title = sanitize(trim($_POST['title']));
    $author = sanitize(trim($_POST['author']));
    $ISBN = sanitize(trim($_POST['ISBN']));
    $bookCopies = sanitize(trim($_POST['bookCopies']));
    $publisherName = isset($_POST['publisherName']) ? sanitize(trim($_POST['publisherName'])) : '';
    $available = sanitize(trim($_POST['available']));
    $categories = sanitize(trim($_POST['categories']));
    $callNumber = sanitize(trim($_POST['callNumber']));

    // Prepare the update query with placeholders
    $sql_update = "UPDATE books SET 
        bookTitle = ?,
        author = ?,
        ISBN = ?,
        bookCopies = ?,
        publisherName = ?,
        available = ?,
        categories = ?,
        callNumber = ?
        WHERE BookId = ?";

    // Create a prepared statement
    $stmt = mysqli_prepare($conn, $sql_update);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssssssssi", $title, $author, $ISBN, $bookCopies, $publisherName, $available, $categories, $callNumber, $bookId);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        $updated = true;
    } else {
        echo "Error updating record: " . mysqli_error($conn); // Display the error message
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include "includes/nav.php"; ?>
    <div class="container">
        <div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">
            <h4 class="center-block"><span class="admin_name">Semua Buku</span></h4>
            <span class="glyphicon glyphicon-book"></span>
            <strong>Books</strong> Table
        </div>
    </div>
    <div class="container" style="overflow-x:auto;">
        <div class="" id="panel-default">
            <div class="panel-heading">
                <?php
                if ($updated) {
                ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Record Updated Successfully!</strong>
                    </div>
                <?php
                }
                ?>
                <?php
                if (isset($error) === true) {
                ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong><?php echo isset($_POST['del']) ? 'Record Deleted Successfully!' : 'Record Updated Successfully!'; ?></strong>
                    </div>
                <?php
                }
                ?>
                <div class="row">
                    <a href="addbook.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px; margin-bottom: 5px; font-size: 15px;">
                            <span class="glyphicon glyphicon-plus-sign"></span> Tambah Buku
                        </button></a>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
                        <!-- Add a search form here if needed -->
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Tanggal Terbit</th>
                        <th>Buku Tersisa</th>
                        <th>Nama Penerbit</th>
                        <th>Tersedia</th>
                        <th>Kategori</th>
                        <th>ID Buku</th>
                        <th>Hapus</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <?php
                if (isset($_POST['search'])) {
                    // Handle search functionality here
                } else {
                    // Display all books from the database
                    $sql2 = "SELECT * FROM books";
                    $query2 = mysqli_query($conn, $sql2);
                    $counter = 1;
                    while ($row = mysqli_fetch_array($query2)) {
                ?>
                        <tbody>
                            <td><?php echo $counter++; ?></td>
                            <td><?php echo $row['bookTitle']; ?></td>
                            <td><?php echo $row['author']; ?></td>
                            <td><?php echo $row['ISBN']; ?></td>
                            <td><?php echo $row['bookCopies']; ?></td>
                            <td><?php echo $row['publisherName']; ?></td>
                            <td><?php echo $row['available']; ?></td>
                            <td><?php echo $row['categories']; ?></td>
                            <td><?php echo $row['callNumber']; ?></td>
                            <form method='post' action='bookstable.php'>
                                <input type='hidden' value="<?php echo $row['bookId']; ?>" name='id'>
                                <td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td>
                            </form>
                            <td> <button class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo $row['bookId']; ?>">Edit</button></td>
                            <div class="modal fade" id="editModal<?php echo $row['bookId']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Book Information</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Update form for this book -->
                                            <form method="post" action="bookstable.php">
                                                <input type="hidden" name="bookId" value="<?php echo $row['bookId']; ?>">

                                                <div class="form-group">
                                                    <label for="title">Judul Buku</label>
                                                    <input type="text" class="form-control" name="title" value="<?php echo $row['bookTitle']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="author">Penulis</label>
                                                    <input type="text" class="form-control" name="author" value="<?php echo $row['author']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="ISBN">Tanggal Terbit</label>
                                                    <input type="text" class="form-control" name="ISBN" value="<?php echo $row['ISBN']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="bookCopies">Buku Tersisa</label>
                                                    <input type="text" class="form-control" name="bookCopies" value="<?php echo $row['bookCopies']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="publisherName">Nama Penerbit</label>
                                                    <input type="text" class="form-control" name="publisherName" value="<?php echo $row['publisherName']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="select">Tersedia</label>
                                                    <select class="form-control" name="available">
                                                        <option value="YES" <?php echo ($row['available'] == 'YES') ? 'selected' : ''; ?>>YES</option>
                                                        <option value="NO" <?php echo ($row['available'] == 'NO') ? 'selected' : ''; ?>>NO</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="category">Kategori</label>
                                                    <input type="text" class="form-control" name="categories" value="<?php echo $row['categories']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="call">ID Buku</label>
                                                    <input type="text" class="form-control" name="callNumber" value="<?php echo $row['callNumber']; ?>">
                                                </div>

                                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tbody>
                <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
    <div class="modal fade" id="popUpWindow">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- header begins here -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title"> Warning</h3>
                </div>

                <!-- body begins here -->
                <div class="modal-body">
                    <p>Are you sure you want to delete this book?</p>
                </div>

                <!-- button -->
                <div class="modal-footer ">
                    <button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-warning pull-right" style="margin-left: 10px" class="close" data-dismiss="modal">
                        No
                    </button>&nbsp;
                    <button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-success pull-right" class="close" data-dismiss="modal" data-toggle="modal" data-target="#info">
                        Yes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="info">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- header begins here -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title"> Warning</h3>
                </div>

                <!-- body begins here -->
                <div class="modal-body">
                    <p>Book deleted <span class="glyphicon glyphicon-ok"></span></p>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script>
        function Delete() {
            return confirm('Would you like to delete the book');
        }
    </script>
</body>

</html>