<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

// Function to update a user
function updateUser($conn)
{
	$adminId = sanitize(trim($_POST['adminId']));
	$adminName = sanitize(trim($_POST['adminName']));
	$password = sanitize(trim($_POST['password']));
	$username = sanitize(trim($_POST['username']));
	$email = sanitize(trim($_POST['email']));

	// Prepare the update query with placeholders
	$sql_update = "UPDATE admin SET 
        adminName = ?,
        password = ?,
        username = ?,
        email = ?
        WHERE adminId = ?";

	// Create a prepared statement
	$stmt = mysqli_prepare($conn, $sql_update);

	// Bind parameters to the prepared statement
	mysqli_stmt_bind_param($stmt, "ssssi", $adminName, $password, $username, $email, $adminId);

	// Execute the prepared statement
	if (mysqli_stmt_execute($stmt)) {
		return true; // Updated successfully
	} else {
		return false; // Error updating
	}
}

if (isset($_POST['del'])) {
	$id = sanitize(trim($_POST['id']));
	$sql_del = "DELETE FROM admin WHERE adminId = $id";
	$error = false;
	$result = mysqli_query($conn, $sql_del);
	if ($result) {
		$error = true;
	}
}

$updated = false;

if (isset($_POST['update'])) {
	// Call the updateUser function to handle the update
	if (updateUser($conn)) {
		$updated = true;
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}
}
?>

<!-- Rest of your HTML code remains the same -->





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

			<h4 class="center-block"><span class="admin_name">Admin List</span> </h4>
		</div>



	</div>
	<div class="container" style="overflow-x:auto;">
		<div class="">
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
					<a href="adduser.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"><span class="glyphicon glyphicon-plus-sign"></span> Add User</button></a>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
						<!-- <form action="users.php" method="post" enctype="multipart / form-data">
			  		<div class="input-group pull-right">
				      <span class="input-group-addon">
					  <button class="btn btn-success" name="search">Search</button> 
				      </span>
				      <input type="text" class="form-control" class="text" name="text" id="text">
			      </div>
			  	</form> -->

					</div>
				</div>
			</div>
			<table class="table table-bordered">

				<thead>
					<tr>
						<th>adminId</th>
						<th>adminName</th>
						<th>password</th>
						<th>username</th>
						<th>email</th>
						<th>Delete</th>
						<th>Edit</th>
					</tr>
				</thead>
				<?php
				$sql = "SELECT * from admin";

				$query = mysqli_query($conn, $sql);
				$counter = 1;
				while ($row = mysqli_fetch_array($query)) { ?>
					<tbody>
						<td> <?php echo $counter++ ?></td>
						<td> <?php echo $row['adminName'] ?></td>
						<td> <?php echo $row['password'] ?></td>
						<td> <?php echo $row['username'] ?></td>
						<td> <?php echo $row['email'] ?></td>
						<form method='post' action='users.php'>
							<input type='hidden' value="<?php echo $row['adminId']; ?>" name='id'>
							<td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td>
						</form>
						<td> <button class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo $row['adminId']; ?>">Edit</button></td>
						<div class="modal fade" id="editModal<?php echo $row['adminId']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
										<!-- Update form for this book -->
										<form method="post" action="users.php">
											<input type="hidden" name="adminId" value="<?php echo $row['adminId']; ?>">

											<div class="form-group">
												<label for="adminName">Admin Name</label>
												<input type="text" class="form-control" name="adminName" value="<?php echo $row['adminName']; ?>">
											</div>

											<div class="form-group">
												<label for="password">Password</label>
												<input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
											</div>

											<div class="form-group">
												<label for="username">Username</label>
												<input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
											</div>

											<div class="form-group">
												<label for="email">Email</label>
												<input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
											</div>
											<button type="submit" name="update" class="btn btn-primary">Update</button>
										</form>

									</div>
								</div>
							</div>
						</div>
					</tbody>

				<?php } ?>

			</table>

		</div>


	</div>

	<!-- Confirm delete modal begins here -->
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
	<!-- Confirm delete modal ends here -->
	<!-- delete message modal starts here -->
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
	<!-- delete message modal ends here -->
	<!-- update modal begins here -->
	<div class="modal fade" id="update">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- header begins here -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title"> Update</h2>
				</div>

				<!-- body begins here -->
				<div class="modal-body">
					<form role="form">
						<div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<span class="input-group-addon">ID</span>
							<input type="Username" class="form-control" name="id" value="1" contenteditable="disabled">

						</div><br>
						<div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<span class="input-group-addon">Username</span>
							<input type="Username" class="form-control" name="id" value="1" contenteditable="disabled">

						</div><br>
						<div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<span class="input-group-addon">Password</span>
							<input type="Username" class="form-control" name="id" value="1" contenteditable="disabled">

						</div><br>


					</form>
				</div>

				<!-- button -->
				<div class="modal-footer">
					<button class="col-lg-12 col-sm-12 col-xs-12 col-md-12 btn btn-success" data-target="alert">
						UPDATE
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- update modal ends here -->





	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript">
		function Delete() {
			return confirm('Would you like to delete the user');
		}


		function search() {
			alert("Hello Wildling!");
		}
	</script>
</body>

</html>