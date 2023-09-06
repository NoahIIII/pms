<!DOCTYPE html>
<?php session_start();?>
<?php if(isset($_SESSION['auth'])) {
    header('location:home.php');
} ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="css/bootstrap.min.css" rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/register.css">
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <?php if(isset($_SESSION['errors'])): ?>
            <?php foreach($_SESSION['errors'] as $error): ?>
                <div class="alert alert-danger text-center"><?= $error; ?></div>
                <?php endforeach; ?>
                <?php unset($_SESSION['errors']); ?>
                <?php endif; ?>
        <form action="handelers/handle_register.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name"  placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email"  placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password"  placeholder="Enter your password">
            </div>
            <div class="form-group">
                <label for="image">upload your profile picture</label>
                <input type="file" name ="image" >
            </div>
            <button type="submit" class="register-button">create new account</button>
        </form>
        <p class="login-link">Already have an account? <a href="index.php" style="color: yellow;">Login</a></p>
    </div>
</body>
</html>

