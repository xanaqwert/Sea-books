<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";


if (isset($_POST['del'])) {
	$id = trim($_POST['del-btn']);
	$msg = "Terbayar/Dikembalikan";
	$sql = "UPDATE borrow set `fine` = '$msg' where borrowId = '$id'";
	$query = mysqli_query($conn, $sql);
	$error = false;
	if ($query) {
		$error = true;
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
	<div class="container" style="overflow-x:auto; margin-top:-7rem;">
		<!-- info alert -->
		<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px;">
			<span class="glyphicon glyphicon-book"></span>
			<strong>Denda</strong>
		</div>

	</div>
	<div class="container" style="overflow-x:auto;">
		<div class="">
			<!-- Default panel contents -->
			<div class="panel-heading">
				<?php if (isset($error) === true) { ?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Record Updated Successfully!</strong>
					</div>
				<?php } ?>
				<div class="row">
					<a><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px; font-size:15px;">Denda</button></a>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
						<!-- <form >
			  		<div class="input-group pull-right">
				      <span class="input-group-addon">
				        <label>Search</label> 
				      </span>
				      <input type="text" class="form-control">
			      </div>
			  	</form> -->

					</div><!-- /.col-lg-6 -->

				</div>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama Anggota</th>
						<th>Nomor Metric</th>
						<th>Nama Buku</th>
						<th>Tanggal Peminjaman</th>
						<th>Tanggal Pengembaliann</th>
						<th>Denda Keterlambatan</th>
						<th>Dikembalikan</th>
					</tr>
				</thead>

				<?php
				$sql = "SELECT * FROM borrow";
				$query = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($query)) {
				?>

					<tbody>
						<tr>
							<td><?php echo $row['borrowId']; ?></td>
							<td><?php echo $row['memberName']; ?></td>
							<td><?php echo $row['matricNo']; ?></td>
							<td><?php echo $row['bookName']; ?></td>
							<td><?php echo $row['borrowDate']; ?></td>
							<td><?php echo $row['returnDate']; ?></td>
							<td><?php echo $row['fine']; ?> (Rupiah)</td>
							<td>
								<form action="fines.php" method="post">
									<input type="hidden" value="<?php echo $row['borrowId']; ?>" name="del-btn">
									<button class="btn btn-warning" name="del">Selesai</button>
								</form>
							</td>
						</tr>
					<?php } ?>
					</tbody>
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
</body>

</html>