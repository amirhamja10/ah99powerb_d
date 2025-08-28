<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';

// Pending users
$pending_users = $conn->query("SELECT * FROM users WHERE status='pending'");
$active_users = $conn->query("SELECT * FROM users WHERE status='active'");
$withdraws = $conn->query("SELECT * FROM withdraw_requests WHERE status='pending'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
<h2>স্বাগতম, অ্যাডমিন!</h2>
<a href="logout.php">Logout</a>

<h3>Pending Users</h3>
<table border="1">
<tr><th>ID</th><th>Phone</th><th>Txn</th><th>Action</th></tr>
<?php while($u = $pending_users->fetch_assoc()) { ?>
<tr>
<td><?= $u['id'] ?></td>
<td><?= $u['phone'] ?></td>
<td><?= $u['transaction_id'] ?></td>
<td><a href="activate.php?id=<?= $u['id'] ?>">Activate</a></td>
</tr>
<?php } ?>
</table>

<h3>Active Users</h3>
<table border="1">
<tr><th>ID</th><th>Phone</th><th>Balance</th><th>Update Balance</th></tr>
<?php while($a = $active_users->fetch_assoc()) { ?>
<tr>
<td><?= $a['id'] ?></td>
<td><?= $a['phone'] ?></td>
<td><?= $a['balance'] ?></td>
<td>
<form action="update_balance.php" method="POST">
<input type="hidden" name="id" value="<?= $a['id'] ?>">
<input type="number" name="balance" placeholder="Amount">
<button type="submit">Update</button>
</form>
</td>
</tr>
<?php } ?>
</table>

<h3>Pending Withdraw Requests</h3>
<table border="1">
<tr><th>ID</th><th>User</th><th>Amount</th><th>Action</th></tr>
<?php while($w = $withdraws->fetch_assoc()) { ?>
<tr>
<td><?= $w['id'] ?></td>
<td><?= $w['user_id'] ?></td>
<td><?= $w['amount'] ?></td>
<td><a href="manage_withdraw.php?id=<?= $w['id'] ?>">Approve</a></td>
</tr>
<?php } ?>
</table>

</body>
</html>