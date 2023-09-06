<!DOCTYPE html>
<?php session_start(); ?>
<?php if (!isset($_SESSION['auth'])) {
    header('location:../index.php');
} elseif ($_SESSION['auth']['role'] != 'admin') {
    header('location:../home.php');
}
?>
<?php include_once '../Data/DB.php'; 
$db= new db();
$orders=$db->GetAll('orders',1);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="css/bootstrap.min.css" rel='stylesheet'>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/home.css">
    <title>Order Table</title>
</head>
   
   

<body>
<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a href="../dashboard.php">
                <img src="../icons/dashboard._whitepng.png" alt="dashboard icon" width="48" height="48">
            </a>
        </div>
    </nav>
    <div class="jumbotron text-center">
        <h1>Current Orders</h1>
    </div>
    <table class="order-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $order):  ?>
            <tr>
                <td><?= $order['id'];?></td>
                <td><?= $order['user_id'];?></td>
                <td><?= $order['total'];?>$</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
