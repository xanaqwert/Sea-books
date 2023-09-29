<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

if (isset($_POST['del'])) {
	$id = sanitize(trim($_POST['id']));
	$sql_del = "DELETE from books where BookId = $id";
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

	// Prepare the update query with placeholders
	$sql_update = "UPDATE books SET bookTitle = ? WHERE BookId = ?";

	// Create a prepared statement
	$stmt = mysqli_prepare($conn, $sql_update);

	// Bind parameters to the prepared statement
	mysqli_stmt_bind_param($stmt, "si", $title, $bookId);

	// Execute the prepared statement
	if (mysqli_stmt_execute($stmt)) {
		$updated = true;
	} else {
		echo "Error updating record: " . mysqli_error($conn); // Display the error message
	}

	// Close the prepared statement
	mysqli_stmt_close($stmt);
}

// if (isset($_POST['update'])) {
// 	$id = sanitize(trim($_POST['id']));
// 	$title = sanitize(trim($_POST['title']));
// 	$author = sanitize(trim($_POST['author']));
// 	$label = sanitize(trim($_POST['label']));
// 	$bookCopies = sanitize(trim($_POST['bookCopies']));
// 	$publisher = sanitize(trim($_POST['publisher']));
// 	$select = sanitize(trim($_POST['select']));
// 	$category = sanitize(trim($_POST['category']));
// 	$call = sanitize(trim($_POST['call']));

// 	$sql_update = "UPDATE books SET 
//         bookTitle = '$title',
//         author = '$author',
//         ISBN = '$label',
//         bookCopies = '$bookCopies',
//         publisherName = '$publisher',
//         available = '$select',
//         categories = '$category',
//         callNumber = '$call'
//         WHERE BookId = $id";

// 	$query_update = mysqli_query($conn, $sql_update);

// 	if ($query_update) {
// 		$error = true; // You can use this to display a success message.
// 	}
// }

?>


<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<?php include "includes/nav.php"; ?>
	<!-- navbar ends -->
	<div class="container">
		<!-- info alert -->
		<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">
			<h4 class="center-block"><span class="admin_name">Semua Buku</span> </h4>
			<span class="glyphicon glyphicon-book"></span>
			<strong>Books</strong> Table
		</div>




	</div>
	<div class="container" style="overflow-x:auto;">
		<div class="" id="panel-default">
			<!-- Default panel contents -->
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
					<a href="addbook.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px; font-size:15px;"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Buku</button></a>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
						<!-- <form method="post" action="bookstable.php" enctype="multipart/form-data">
			  		<div class="input-group pull-right">
				      <span class="input-group-addon">
				        <button class="btn btn-success" name="search">Search</button> 
				      </span>
				      <input type="text" class="form-control" name="text">
			      </div>
			  	</form> -->

					</div><!-- /.col-lg-6 -->

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

					$text = sanitize(trim($_POST['text']));

					$sql = "SELECT * FROM books where BookId = $text ";

					$query = mysqli_query($conn, $sql);



					while ($row = mysqli_fetch_array($query)) { ?>
						<tbody>

							<td><?php echo $row['bookId']; ?></td>
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

							<form method="post" action="bookstable.php">

								<input type="hidden" name="bookId" value="<?php echo $row['bookId']; ?>">

								<td><input type="text" name="title" value="<?php echo $row['bookTitle']; ?>"></td>

								<td><input type="text" name="author" value="<?php echo $row['author']; ?>"></td>

								<td><button type="submit" name="update">Update</button></td>

							</form>
						</tbody>
					<?php  }
				} else {
					$sql2 = "SELECT * from books";

					$query2 = mysqli_query($conn, $sql2);
					$counter = 1;
					while ($row = mysqli_fetch_array($query2)) { ?>
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
							<form method="post" action="bookstable.php">

								<input type="hidden" name="bookId" value="<?php echo $row['bookId']; ?>">

								<td><input type="text" name="title" value="<?php echo $row['bookTitle']; ?>"></td>

								<td><input type="text" name="author" value="<?php echo $row['author']; ?>"></td>

								<td><button type="submit" name="update">Update</button></td>

							</form>
						</tbody>

				<?php 	}
				}

				?>
			</table>

		</div>
	</div>
	<div class="mod modal fade" id="popUpWindow">
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
			return confirm('Would you like to delete the news');
		}
	</script>
</body>

</html>