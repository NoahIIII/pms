<!DOCTYPE html>
<?php session_start(); ?>
<?php if (!isset($_SESSION['auth'])) {
    header('location:index.php');
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/home.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a href="dashboard.php">
            <img src="icons/dashboard._whitepng.png" alt="dashboard icon" width="48" height="48">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
    </nav>
    <div class="jumbotron text-center" style="background-color: #6c5ce7; color: #ffffff;">
        <h1 class="display-4">Welcome, <?= $_SESSION['auth']['name']; ?></h1>
        <br>
        <a href="home.php" class="btn btn-lg btn-purple">Shop Now</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <img class="profile-image" src=<?= $_SESSION['auth']['image'] ?> alt="Profile Image">
                <div class="user-data-container">
                    <p class="user-data-label">Name:</p>
                    <p><?= $_SESSION['auth']['name']; ?></p>
                    <p class="user-data-label">Email:</p>
                    <p><?= $_SESSION['auth']['email']; ?></p>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>