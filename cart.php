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
        <h1 class="display-4"> <?=$_SESSION['auth']['name'];?>'s cart</h1>
        <p class="lead">Here, you can find all the products in your cart</p>
        <a href="home.php" class="btn btn-lg btn-purple">Shop Now</a>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $db = new DB();
            $db = new db();
            $user_id = $_SESSION['auth']['id'];
            $cart = $db->GetAll('cart', "user_id = $user_id");
            $products = [];
            foreach ($cart as $value) {
                $id = $value['product_id'];
                $products[] = $db->GetAll('products', "id = $id");
            }

            foreach ($products as $product => $value) {
                foreach ($value as $inside) {
                   
            ?>
                    <div class="col-md-4 mb-4">
                        <div class="card" style="background-color: #ffffff;">
                            <img src="<?= $inside['image'] ?>" class="card-img-top" alt="<?= $inside['name'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $inside['name']; ?></h5>
                                <p class="card-text"><?= $inside['category_name']; ?></p>
                                <p class="card-text"><?= $inside['price'].'$'; ?></p>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex flex-column align-items-center">
                                    <form action="actions/delete_from_cart.php" method="POST">
                                        <input type="hidden" name="product_id" value="<?= $inside['id']; ?>">
                                        <button type="submit" class="btn btn-danger mb-2">Delete</button>
                                    </form>
                                    <div class="quantity-controls">
                                    <form action="actions/update_quantity.php" method="POST">
                                            <input type="hidden" name="product_id" value="<?= $inside['id']; ?>">
                                            <input type="hidden" name="user_id" value="<?= $_SESSION['auth']['id']; ?>">
                                            <input type="hidden" name="action" value="-">
                                            <button type="submit" class="btn btn-secondary">-</button>
                                            </form>

                                        <span class="quantity"><?= $db->GetColumn('quantity', 'cart', "user_id = $user_id AND product_id = {$inside['id']}"); ?></span>
                                        <form action="actions/update_quantity.php" method="POST">

                                            <input type="hidden" name="product_id" value="<?= $inside['id']; ?>">
                                            <input type="hidden" name="user_id" value="<?= $_SESSION['auth']['id']; ?>">
                                            <input type="hidden" name="action" value="+">
                                            <button type="submit" class="btn btn-secondary">+</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
            $quantity=$db->GetColumn('quantity', 'cart', "user_id = $user_id AND product_id = {$inside['id']}");
            $total=$total+$inside['price']*$quantity;
                }
            }
            ?>
        </div>
    </div>


    <div class="text-center my-4">
        <form action="handelers/handle_order.php" method="POST">
            <button class="btn btn-lg btn-purple">Order Now <?='( '.$total.'$ )'.''?></button>
        </form>
    </div>

    <?php if (!empty($_SESSION['suc'])) : ?>
        <div id="success-container" class="alert-container">
            <?php foreach ($_SESSION['suc'] as $suc) : ?>
                <div class="alert alert-success text-center"><?= $suc; ?></div>
            <?php endforeach; ?>
            <?php unset($_SESSION['suc']); ?>
        </div>
    <?php endif; ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>