<!DOCTYPE html>
<?php session_start() ?>
<?php
if (!isset($_SESSION['auth'])) {
    header('location:index.php');
}
include_once 'Data/DB.php';
$db=new db();
$id=$_SESSION['auth']['id'];
$orders=$db->GetAll('orders',"user_id = $id");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMS Online Store</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/home.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <?php if ($_SESSION['auth']['role'] == 'admin') : ?>
            <a href="dashboard.php">
                <img src="icons/dashboard._whitepng.png" alt="dashboard icon" width="48" height="48">
            </a>
            <span class="navbar-toggler-icon"></span>
            </button>
        <?php endif; ?>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <?php if(!empty($orders)): ?>
                <li class="nav-item">
                    <a href="cart_old_orders.php">
                        <img src="icons/history.png" alt="historyicon" width="38" height="38">
                    </a>
                </li>
                    <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>

            </ul>
        </div>
    </nav>
    <div class="jumbotron text-center">
        <h1>Welcome to PMS Online Store</h1>
        <p>Your one-stop shop for Project Management Software solutions.</p>
        <a href="home.php" class="btn btn-purple btn-lg">Shop Now</a>
    </div>


    <div class="container">
        <?php
        $db = new DB();
        $productsPerPage = 10;
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($currentPage - 1) * $productsPerPage;
        $products = $db->GetSpecificRows('products', $offset, $productsPerPage);
        foreach ($products as $product) {
            echo '<div class="product-card">';
            echo '<div class="card mb-4">';
            echo '<img src="' . $product['image'] . '" class="card-img-top" alt="' . $product['name'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $product['name'] . '</h5>';
            echo '<p class="card-text">' . $product['category_name'] . '</p>';
            echo '<p class="card-text">' . $product['price'] . '$' . '</p>';
            echo '<form action="actions/addtocart.php" method="POST">';
            echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
            echo '<button type="submit" class="btn btn-purple">Add to cart</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
        <?php if (!empty($_SESSION['suc'])) : ?>
            <div id="success-container" class="alert-container">
                <?php foreach ($_SESSION['suc'] as $suc) : ?>
                    <div class="alert alert-success text-center"><?= $suc; ?></div>
                <?php endforeach; ?>
                <?php unset($_SESSION['suc']); ?>
            <?php endif; ?>
            </div>
            <?php if (!empty($_SESSION['errors'])) : ?>
                <div id="error-container" class="alert-container">
                    <?php foreach ($_SESSION['errors'] as $error) : ?>
                        <div class="alert alert-error text-center"><?= $error; ?></div>
                    <?php endforeach; ?>
                    <?php unset($_SESSION['errors']); ?>
                <?php endif; ?>
                </div>
                <div style="clear: both;"></div>
                <ul class="pagination justify-content-center">
                    <?php
                    $totalProducts = $db->GetRowsNum('products');
                    $totalPages = ceil($totalProducts / $productsPerPage);
                    for ($i = 1; $i <= $totalPages; $i++) {
                        $activeClass = $i === $currentPage ? 'active' : '';
                        echo '<li class="page-item ' . $activeClass . '">';
                        echo '<a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">' . $i . '</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>