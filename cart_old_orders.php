<!DOCTYPE html>
<?php session_start() ?>
<?php
if (!isset($_SESSION['auth'])) {
    header('location:index.php');
}
?>
<?php $total=0; ?>
<html lang="en">
<?php include_once 'Data/DB.php'; ?>
<?php $db=new db();
$id=$_SESSION['auth']['id'];
$orders=$db->GetAll('orders',"user_id = $id");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMS Online Store</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/home.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>

<body style="background-color: #ffffff;">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6c5ce7;">
    <?php if($_SESSION['auth']['role']=='admin'): ?>
    <a href="dashboard.php">
        <img src="icons/dashboard._whitepng.png" alt="dashboard icon" width="48" height="48">
    </a>        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php endif; ?>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" href="home.php" style="color: #ffffff;">Home</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php" style="color: #ffffff;">Profile</a>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" style="color: #ffffff;">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron text-center" style="background-color: #6c5ce7; color: #ffffff;">
        <h1 class="display-4"> <?=$_SESSION['auth']['name'];?>'s order history</h1>
        <p class="lead">View your complete order history to track past purchases, review order details, and monitor the status of your online shopping transactions </p>
        <a href="home.php" class="btn btn-lg btn-purple">Shop Now</a>
    </div>
    <table class="order-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $order):  ?>
            <tr>
                <td><?= $order['id'];?></td>
                <td><?= $order['total'];?>$</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    


    


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>