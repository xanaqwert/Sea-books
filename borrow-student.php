<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include 'includes/header.php';

// Function to safely escape and sanitize user input
function sanitizeInput($input)
{
	global $conn;
	return mysqli_real_escape_string($conn, htmlspecialchars($input));
}

?>

<?php include "includes/nav.php"; ?>
<div class="container">
	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">
		<span class="glyphicon glyphicon-book"></span>
		<strong>Borrow Books</strong>
	</div>
</div>

<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<form method="get" action="borrow-student.php">
					<label for="categories">Category:</label>
					<select name="categories" id="categories">
						<option value="all">All</option>
						<option value="Fiction">Fiction</option>
						<option value="Subjects">Subjects</option>
						<option value="Biography">Biography</option>
					</select>
					<input type="submit" value="Filter">
				</form>
			</div>
			<div class="row">
				<form method="get" action="borrow-student.php">
					<label for="search">Search by Title:</label>
					<input type="text" name="search" id="search" placeholder="Enter book title">
					<input type="submit" value="Search">
				</form>
			</div>
		</div>

		<table class="table table-bordered">
			<tr>
				<th>Nomor</th>
				<th>Judul Buku</th>
				<th>Penulis</th>
				<th>Buku Tersisa</th>
				<th>Nama Penerbit</th>
				<th>Tersedia</th>
				<th>Kategori</th>
				<th>cover</th>
				<th>Pinjam</th>

			</tr>
			</thead>
			<?php
			// Check if the search parameter is set
			if (isset($_GET['search'])) {
				$searchTerm = sanitizeInput($_GET['search']);

				$sql = "SELECT * FROM books WHERE bookTitle LIKE '%$searchTerm%'"; // Use LIKE for partial matches
			} else {
				$sql = "SELECT * FROM books";
			}

			if (isset($_GET['categories']) && $_GET['categories'] !== 'all') {
				// Add category filter to the SQL query
				$selectedCategory = sanitizeInput($_GET['categories']);
				$sql .= " WHERE categories = '$selectedCategory'";
			}

			$query = mysqli_query($conn, $sql);
			$counter = 1;

			while ($row = mysqli_fetch_array($query)) {
				$_SESSION['book_Title'] = $row['bookTitle'];
				$cover_url = !empty($row['cover']) ? $row['cover'] : '';
			?>
				<tbody>
					<tr>
						<td><?php echo $counter++; ?></td>
						<td><?php echo $row['bookTitle']; ?></td>
						<td><?php echo $row['author']; ?></td>
						<td><?php echo $row['bookCopies']; ?></td>
						<td><?php echo $row['publisherName']; ?></td>
						<td><?php echo $row['available']; ?></td>
						<td><?php echo $row['categories']; ?></td>
						<td>
							<?php if (!empty($cover_url)) : ?>
								<img src="<?php echo $cover_url; ?>" alt="Cover Image" style="max-width: 100px;">
							<?php else : ?>
								No Cover Image
							<?php endif; ?>
						</td>
						<td>
							<a href="lend-student.php?bid=<?php echo $row['bookId'] ?>" id="show" class="show-in">
								<button class="btn btn-success" style="font-size: 12px; margin-right:-3rem">Pinjam Sekarang</button>
								<input type="hidden" class="book-id" value="<?php echo $row['bookId']; ?>">
								<input type="hidden" class="book-name" value="<?php echo $row['bookTitle']; ?>">
								<input type="hidden" class="purpose" value="show">
							</a>
						</td>
					</tr>
				</tbody>
			<?php
			}
			?>
		</table>
	</div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js.bootstrap.js"></script>
</body>

</html>