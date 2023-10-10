<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

// if ((isset($_SESSION['auth']) && $_SESSION['auth'] === true)) {
// 	header("Location: admin.php");
// 	exit();
// }

// 	if (isset($_GET['access'])) {
// 		$alert_user = true;
// 	}

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

// Error check

// 					echo"<br>";
// 					echo mysqli_errno($conn);

if (isset($_POST['submit'])) {
	$username = sanitize(trim($_POST['username']));
	$password = sanitize(trim($_POST['password']));

	$sql_admin = "SELECT * from admin where username = '$username' and  password = '$password' ";
	$query = mysqli_query($conn, $sql_admin);
	// echo mysqli_error($conn);
	if (mysqli_num_rows($query) > 0) {

		while ($row = mysqli_fetch_assoc($query)) {
			$_SESSION['auth'] = true;
			$_SESSION['admin'] = $row['username'];
		}
		if ($_SESSION['auth'] === true) {
			header("Location: admin.php");
			exit();
		}
	} else {
		$sql_stud = "SELECT * from students where username='$username' and password = '$password'";
		$query = mysqli_query($conn, $sql_stud);
		$row = mysqli_fetch_assoc($query);
		if (mysqli_num_rows($query) > 0) {
			$_SESSION['student-username'] = $row['username'];
			$_SESSION['student-name'] = $row['name'];
			$_SESSION['student-matric'] = $row['matric_no'];
			header("Location:studentportal.php");
		} else {
			echo "<div class='alert alert-success alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong style='text-align: center'> Wrong Username and Password.</strong>
				  </div>";
		}
	}
}


?>

<!DOCTYPE html>
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

	<div class="container" style="margin-top: 10rem;">
		<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1">
			<div class="jumbotron login" style="background-color: #F9F9F9 !important;">
				<h2 class="page-header text-center">LOGIN</h2>

				<form class="form-horizontal" role="form" method="post" action="login.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="username" placeholder="Enter Username" id="username" required>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password" placeholder="Enter Password" id="password" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-8">
							<input type="submit" class="btn btn-info col-lg-4" style="background-color:#5297F7" name="submit" value="Sign In">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
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