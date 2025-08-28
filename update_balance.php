<?php
include 'db.php';
$id = $_POST['id'];
$balance = $_POST['balance'];
$conn->query("UPDATE users SET balance=$balance WHERE id=$id");
header("Location: dashboard.php");