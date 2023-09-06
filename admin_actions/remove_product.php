<!DOCTYPE html>
<?php session_start(); ?>

<?php if(!isset($_SESSION['auth'])){
    header('location:../index.php');
} 
elseif($_SESSION['auth']['role']!='admin'){
    header('location:../home.php');
}
?>
<html>

<head>
    <title>Remove product</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="css/bootstrap.min.css" rel='stylesheet'>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../style/home.css">
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
        <h1>Remove Product</h1>
        <p>if the product is already is customer cart you can't remove it, you should help me earn money admin .</p>
    </div>

    <div class="container">
        <div class="form-container">
            <h2>Enter Product ID </h2>
            <form action="action.php" method="POST">
                <div class="form-group">
                    <label for="product_id">Product ID</label>
                    <input type="text" class="form-control" id="product_id" name="product_id" placeholder="Enter the product id">
                </div>
                <input type="hidden" name="action" value="remove product">
                <button type="submit" class="btn btn-purple">Remove Product</button>
            </form>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>