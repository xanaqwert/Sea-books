<?php

$bookId = filter_input(INPUT_POST, 'bookId', FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);

$sql = "UPDATE books SET  
        bookTitle='$title' WHERE bookId=$bookId";

$result = mysqli_query($conn, $sql);

if ($result) {
    $updated = true;
    header("Location: bookstable.php");
} else {
    echo "Error updating record";
}
