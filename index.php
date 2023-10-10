<?php
// session_start(); 
// session_destroy();
// if (!(isset($_SESSION['auth']) && $_SESSION['auth'] === true)) {
// 	header("Location: admin.php?access=false");
// 	exit();
// }
// else {
// $admin = $_SESSION['admin'];
// }
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

// if(isset($_SESSION['admin'])){
// 	$admin = $_SESSION['admin'];
// 	// echo "Hello $user";
// }

if (isset($_POST['submit'])) {

	$news = sanitize(trim($_POST['news']));

	$sql = "INSERT into news (announcement) values ('$news')";

	$query = mysqli_query($conn, $sql);
	$error = false;

	if ($query) {
		$error = true;
	} else {
		echo "<script>alert('Not successful!! Try again.');
                    </script>";
	}
}

if (isset($_POST['UpDat'])) {
	$id = sanitize(trim($_POST['id']));
	$text = sanitize(trim($_POST['text']));

	$sql_up = "UPDATE news set announcement = '$text' where newsId = '$id'";
	echo mysqli_error($sql_up);
	$result = mysqli_query($conn, $sql_del);
	if ($result) {
		echo "<script>
            
           
                   alert('Update successful');

         </script>";
	}
}

if (isset($_POST['del'])) {

	$id = sanitize(trim($_POST['id']));

	$sql_del = "DELETE from news where newsId = $id";

	$result = mysqli_query($conn, $sql_del);
	if ($result) {
		//            echo "<script>

		//    var response = confirm('Would you like to delete the user');
		//    if (response == true) {
		//        alert('User was successfully deleted from the database');
		//            location.href ='admin.php';
		//    }   

		//    else
		//        {
		//            alert('Could not delete user');
		//        }


		// </script>";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/navbar2.css">
	<link rel="stylesheet" type="text/css" href="flickity/flickity.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<script type="text/javascript" src="flickity/flickity.js"></script>
	<title>Library Management</title>

</head>

<body>
	<?php include "includes/nav.php"; ?>
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

	<div class="container-fluid slide">
		<h4 class="center-block" style="color:#282828">Selamat Datang Di <span style="color:#5297f7;font-size:45px;font-weight:405;">Sea-Books</span></h4>
		<div class="slider">
			<!-- <h1>Flickity - wrapAround</h1> -->

			<div class="body-carousel">
				<input type="radio" name="position" />
				<input type="radio" name="position" />
				<input type="radio" name="position" checked />
				<input type="radio" name="position" />
				<input type="radio" name="position" />
				<main id="carousel">
					<div class="item">
						<img alt="Image 1" src="https://i.ibb.co/Pg4Q6X8/IMG-0777.jpg">
					</div>
					<div class="item">
						<img alt="Image 2" src="https://i.ibb.co/DQ39G7D/IMG-0778.jpg">
					</div>
					<div class="item">
						<img alt="Image 3" src="https://i.ibb.co/2cbqFzN/IMG-0776.jpg">
					</div>
					<div class="item">
						<img alt="Image 4" src="https://i.ibb.co/HDTvPBq/IMG-0775.jpg">
					</div>
					<div class="item">
						<img alt="Image 5" src="https://i.ibb.co/K5LWCBh/IMG-0774.jpg">
					</div>
					<main>
			</div>
		</div>
	</div>

	<!-- Pemberitahuan -->
	<div class="container slide2">
		<div class="panel-heading">
			<div class="row">
				<h3 class="center-block" style="font-size: 30px;">Pengumuman Terbaru</h3>
			</div>
		</div>
		<table class="table table-bordered" style="font-size: 18px;">
			<thead>
				<tr>
					<th>NewsId</th>
					<th>Announcement</th>
				</tr>
			</thead>
			<?php
			$sql2 = "SELECT * from news";
			$query2 = mysqli_query($conn, $sql2);
			$counter = 1;
			while ($row = mysqli_fetch_array($query2)) {  ?>
				<tbody>
					<td><?php echo $counter++; ?></td>
					<td><?php echo $row['announcement']; ?></td>

				</tbody>
			<?php }
			?>
			</tbody>
		</table>
	</div>


	<div class="footers" style="margin-top: 5rem;">
		<footer>
			<div class="row">
				<div class="col col1" data-aos="fade-right">
					<img src="https://i.ibb.co/brcd6Jd/sea-books-logo-modified.png" alt="Ini Logo" style="width: 7rem" />
					<h1>...</h1>
					<p>Sea-Books, Your Fav Library on School</p>
				</div>
				<div class="col col3" data-aos="fade-right">
					<h3>JADILAH YANG PERTAMA UNTUK MENDENGAR KABAR DARI KAMI</h3>
					<input type="text" />
					<span>E-MAIL</span>
					<button>SUBSCRIBE</button>
				</div>
			</div>
		</footer>
	</div>


	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>

</html>