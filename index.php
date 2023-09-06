<!DOCTYPE html>
<?php session_start();?>
<?php if(isset($_SESSION['auth'])) {
    header('location:home.php');
} ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/register.css">
</head>
<body>
    <div class="register-container">
        <h2>Login</h2>
        <?php if(isset($_SESSION['errors'])): ?>
            <?php foreach($_SESSION['errors'] as $error): ?>
                <div class="alert alert-danger text-center"><?= $error; ?></div>
                <?php endforeach; ?>
                <?php unset($_SESSION['errors']); ?>
                <?php endif; ?>
        <form action="handelers/handle_login.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email"  placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password"  placeholder="Enter your password">
            </div>
            <button type="submit" class="register-button">Login</button>
        </form>
        <p class="login-link">Don't have an account? <a href="register.php" style="color: yellow;">create new account</a></p>
    </div>
</body>
</html>
