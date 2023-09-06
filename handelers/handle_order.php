<!DOCTYPE html>
<?php session_start();
if(!isset($_SESSION['auth']))
{
    header('location:../index.php');
}
?>

<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/home.css">

    <title>Confirm Order</title>
</head>
<body>
<?php if (!empty($_SESSION['errors'])): ?>
    <div id="error-container" class="alert-container">
        <?php foreach ($_SESSION['errors'] as $error): ?>
            <div class="alert alert-error text-center"><?= $error; ?></div> 
        <?php endforeach; ?>
        <?php unset($_SESSION['errors']); ?>
        <?php endif; ?>
    </div>
<nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="../home.php">PMS Online Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
<div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
</nav>
<div class="container mt-5">
    <div class="jumbotron">
        <h3>Please enter some details to confirm your order</h3>
        <form action="../actions/order.php" method="POST">
            <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address">
            </div>
            <button type="submit" class="btn btn-purple">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
