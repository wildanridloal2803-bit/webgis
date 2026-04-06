
<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    $user = mysqli_fetch_assoc($query);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username']; // 🔥 INI PENTING

        header("Location: index.php");
    } else {
        echo "<script>alert('Login gagal!');</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width:400px">
    <h3 class="text-center">Login Admin</h3>

    <form method="POST">
        <div class="mb-3">
            Username
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            Password
            <input type="password" name="password" class="form-control" required>
        </div>

        <button name="login" class="btn btn-primary w-100">Login</button>
    </form>
</div>

</body>
</html>