<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

if (isset($_POST['submit'])) {
	$id = trim($_POST['del_btn']);
	$sql = "DELETE from students where studentId = '$id' ";
	$query = mysqli_query($conn, $sql);

	if ($query) {
		echo "<script>alert('Student Deleted!')</script>";
	}
}

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
			<h4 class="center-block"><span class="admin_name">Data Murid & Guru</span> </h4>
			<span class="glyphicon glyphicon-book"></span>
			<strong>Murid & Guru</strong> Table
		</div>
		<!-- <div class="alert alert-info col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
		<button class="btn btn-success" style="float: left"><span class="glyphicon glyphicon-plus-sign"></span> Add Button</button>
		
	    <form class="form-vertical col-lg-6 col-md-6 col-sm-6 col-xs-12" role="form" style="float: right">
	    	<div class="form-group ">
				<label for="Username" class="col-lg-8 col-md-2 col-xs-8 col-sm-8 control-label">Search User</label>
				<div class="col-lg-12 col-md-12 col-sm-10 col-xs-12  ">
							<input type="text" class="form-control" name="username" placeholder="Enter Username" id="username">
				</div>		
			</div>
	    </form>
    </div> -->




	</div>
	<div class="container col-lg-12 " style="overflow-x:auto;">
		<div class="">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<div class="row">
					<a href="addstudent.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px; font-size:15px;"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Murid Atau Guru</button></a>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
						<!-- <form >
			  		<div class="input-group pull-right">
				      <span class="input-group-addon">
				        <label>Search</label> 
				      </span>
				      <input type="text" class="form-control" onkeyup="hey()">
			      </div>
			  	</form> -->

					</div><!-- /.col-lg-6 -->

				</div>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Nama Murid/Guru</th>
						<th>ID Anggota</th>
						<th>Email</th>
						<th>Jurusan</th>
						<th>No Telp</th>

						<th>Username</th>
						<th>Password</th>
						<th>Hapus</th>
						<th>Edit</th>
					</tr>
				</thead>
				<?php

				$sql = "SELECT * FROM students";
				$query = mysqli_query($conn, $sql);
				$counter = 1;
				while ($row = mysqli_fetch_assoc($query)) {
				?>
					<tbody>
						<tr>
							<td><?php echo $counter++; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['matric_no']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['dept']; ?></td>
							<td><?php echo $row['phoneNumber']; ?></td>

							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['password']; ?></td>
							<td>
								<form action="viewstudents.php" method="post">
									<input type="hidden" value="<?php echo $row['studentId']; ?>" name="del_btn">
									<button name="submit" class="btn btn-warning">DELETE</button>
								</form>
							</td>
							<td>
								<button class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo $row['studentId']; ?>">Edit</button>
							</td>
							<?php
							$sql = "SELECT * FROM students";
							$query = mysqli_query($conn, $sql);

							while ($row = mysqli_fetch_assoc($query)) {
							?>
								<div class="modal fade" id="editModal<?php echo $row['studentId']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="editModalLabel">Edit Student Information</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<!-- Update form for this student -->
												<form method="post" action="updatestudent.php">
													<input type="hidden" name="studentId" value="<?php echo $row['studentId']; ?>">

													<div class="form-group">
														<label for="name">Nama</label>
														<input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
													</div>

													<div class="form-group">
														<label for="matric_no">ID Anggota</label>
														<input type="text" class="form-control" name="matric_no" value="<?php echo $row['matric_no']; ?>">
													</div>

													<div class="form-group">
														<label for="email">email</label>
														<input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
													</div>

													<div class="form-group">
														<label for="dept">Jurusan</label>
														<input type="text" class="form-control" name="dept" value="<?php echo $row['dept']; ?>">
													</div>

													<div class="form-group">
														<label for="phoneNumber">phoneNumber</label>
														<input type="text" class="form-control" name="phoneNumber" value="<?php echo $row['phoneNumber']; ?>">
													</div>

													<div class="form-group">
														<label for="username">username</label>
														<input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
													</div>

													<div class="form-group">
														<label for="password">password</label>
														<input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
													</div>

													<!-- Add other fields like matric_no, email, dept, phoneNumber, username, and password here -->

													<button type="submit" name="update" class="btn btn-primary">Update</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>

						</tr>

					</tbody>
				<?php } ?>
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
					<p>Are you sure you want to delete this Member?</p>
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
					<p>Member deleted <span class="glyphicon glyphicon-ok"></span></p>
				</div>

			</div>
		</div>
	</div>





	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript">
		function hey() {
			alert("Hello");
		}
	</script>
</body>

</html>