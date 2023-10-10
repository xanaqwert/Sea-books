<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

if (isset($_POST['update'])) {
    $studentId = sanitize(trim($_POST['studentId']));
    $name = sanitize(trim($_POST['name']));
    $matric_no = sanitize(trim($_POST['matric_no']));
    $email = sanitize(trim($_POST['email']));
    $dept = sanitize(trim($_POST['dept']));
    $phoneNumber = sanitize(trim($_POST['phoneNumber']));
    $username = sanitize(trim($_POST['username']));
    $password = sanitize(trim($_POST['password']));

    // Prepare the update query with placeholders
    $sql_update = "UPDATE students SET 
        name = ?,
        matric_no = ?,
        email = ?,
        dept = ?,
        phoneNumber = ?,
        username = ?,
        password = ?
        WHERE studentId = ?";

    // Create a prepared statement
    $stmt = mysqli_prepare($conn, $sql_update);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssssssi", $name, $matric_no, $email, $dept, $phoneNumber, $username, $password, $studentId);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        $updated = true; // Updated successfully
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}


// Redirect back to the student list page after updating
header("Location: viewstudents.php");
