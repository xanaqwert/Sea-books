<?php

require 'includes/db-inc.php';
session_start();
$student_name = $_SESSION['student-username'];

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="/css/card.css">
	<link rel="stylesheet" type="text/css" href="flickity/flickity.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<!-- bootstrap 5 Js bundle CDN-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
	<script type="text/javascript" src="flickity/flickity.js"></script>
	<title>Library Management</title>

</head>

<body>
	<!-- navbar begins -->
	<?php include "includes/nav.php"; ?>












	<!-- <div class="container">


		<form action="search.php" method="get" style="width: 100%; max-width: 30rem">

			<div class="input-group my-5">
				<input type="text" class="form-control" name="key" placeholder="Search Book..." aria-label="Search Book..." aria-describedby="basic-addon2">

				<button class="input-group-text
		                 btn btn-primary" id="basic-addon2">
					<img src="img/search.png" width="20">

				</button>
			</div>
		</form>
		<div class="d-flex pt-3">
			<div class="pdf-list d-flex flex-wrap">
				<div class="card m-1" style="width:18rem;">
					<img src="https://i.pinimg.com/originals/a8/91/d9/a891d9ddd8472c3fd84bf85a80693ac9.jpg" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title">
							Naruto
						</h5>
						<p class="card-text">
							<i><b>By: Masashi Kishimoto
									<br></b></i>
							Naruto adalah sebuah serial manga karya Masashi Kishimoto yang diadaptasi menjadi serial anime. Manga Naruto bercerita seputar kehidupan tokoh utamanya, Naruto Uzumaki, seorang ninja yang hiperaktif
							<br><i><b>Category:
									Action
									<br></b></i>
						</p>
						<a href="uploads/files/<?= $book['file'] ?>" class="btn btn-success">Open</a>

						<a href="uploads/files/<?= $book['file'] ?>" class="btn btn-primary" download="<?= $book['title'] ?>">Download</a>
					</div>
				</div>
			</div>

			<div class="category">
				List of categories -->
	<!-- <div class="list-group">

					<a href="#" class="list-group-item list-group-item-action active">Category</a>

					<a href="category.php?id=<?= $category['id'] ?>" class="list-group-item list-group-item-action">
						action</a>
				</div>

				List of authors -->
	<!-- <div class="list-group mt-5">

					<a href="#" class="list-group-item list-group-item-action active">Author</a>
					<a href="author.php?id=<?= $author['id'] ?>" class="list-group-item list-group-item-action">
						masashi kishimoto</a>
				</div>
			</div>
		</div>
	</div> -->


	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>