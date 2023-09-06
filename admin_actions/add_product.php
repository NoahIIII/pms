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
    <title>Add product</title>
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
        <h1>Add Product</h1>
    </div>

    <div class="container">
        <div class="form-container">
            <h2>Enter Product Details</h2>
            <form action="action.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter the product name">
                </div>
                <div class="form-group">
                    <label for="product_price">Product Price</label>
                    <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter the product price">
                </div>
                <div class="form-group">
                    <label for="product_category">Product Category</label>
                    <input type="text" class="form-control" id="product_category" name="product_category" placeholder="Enter the product category">
                </div>
                <div class="form-group">
                    <label for="product_Image">Product Image</label>
                    <input type="file" class="form-control" id="product_Image" name="image" >
                </div>
                <input type="hidden" name="action" value="add product">
                <button type="submit" class="btn btn-purple">Add Product</button>
            </form>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>