<?php
session_start();
if(isset($_SESSION['username'])){
    header('Location: index.php');
    exit;
}

$err = '';
$username = '';
$password = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $c_username = 'Sobuj';
    $c_password = '1234';

    if($password == $c_password && $username == $c_username){
        $_SESSION['username'] = $username;
        $err = '';
        header('Location: index.php');
        exit;
    } else {
        $err = 'Invalid Username or Password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Login Form</h2>
    <?php if(isset($err) && $err != ''): ?>
        <p style="color: red;"><?php echo $err; ?></p>
    <?php endif; ?>
    <form action="" method="post">
        <div class="container">
            <input id="un" type="text" name="username" required placeholder="Username"><br>
            <input id="pw" type="password" name="password" required placeholder="Password"><br>
            <input id="btn" type="submit" value="Login">
        </div>
    </form>
</body>
</html>
