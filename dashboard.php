<!DOCTYPE html>
<?php session_start(); ?>
<?php if (!isset($_SESSION['auth'])) {
    header('location:../index.php');
} elseif ($_SESSION['auth']['role'] != 'admin') {
    header('location:../home.php');
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/home.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a href="home.php">
                <img src="icons/home.png" alt="home icon" width="48" height="48">
            </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="jumbotron text-center">
        <h1>Welcome to the admin dashboard</h1>
        <p>here, you can control the database operations . </p>
    </div>

    <div class="container">
        <div class="button-container">
            <a href="admin_actions/add_product.php" class="btn btn-purple">Add Product</a>

            <a href="admin_actions/remove_product.php" class="btn btn-purple">Remove Product</a>
        </div>

        <div class="button-container">
            <a href="admin_actions/add_category.php" class="btn btn-purple">Add Category</a>

            <a href="admin_actions/remove_category.php" class="btn btn-purple">Remove Category</a>
        </div>
        <div class="button-container">

            <a href="admin_actions/view_orders.php" class="btn btn-purple">View Orders</a>
        </div>
    </div>
    <?php if (!empty($_SESSION['suc'])) : ?>
        <div id="success-container" class="alert-container">
            <?php foreach ($_SESSION['suc'] as $suc) : ?>
                <div class="alert alert-success text-center"><?= $suc; ?></div>
            <?php endforeach; ?>
            <?php unset($_SESSION['suc']); ?>
        <?php endif; ?>
        <?php if (!empty($_SESSION['errors'])) : ?>
            <div id="error-container" class="alert-container">
                <?php foreach ($_SESSION['errors'] as $error) : ?>
                    <div class="alert alert-error text-center"><?= $error; ?></div>
                <?php endforeach; ?>
                <?php unset($_SESSION['errors']); ?>
            <?php endif; ?>

            <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>