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
    <title>remove category</title>
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
        <h1>Remove category</h1>
        <h4>when you remove a category, every product in that category will be removed!</h4>

    </div>
   

    <div class="container">
        <div class="form-container">
            <h2>Enter category name </h2>
            <form action="action.php" method="POST">
                <div class="form-group">
                    <label for="product_id">category name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter the category name">
                </div>
                <input type="hidden" name="action" value="remove category">
                <button type="submit" class="btn btn-purple">Remove category</button>
            </form>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>