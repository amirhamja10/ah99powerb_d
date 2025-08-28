<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("UPDATE withdraw_requests SET status='approved' WHERE id=$id");
header("Location: dashboard.php");