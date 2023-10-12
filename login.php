<?php
session_start();
include("./admin/config/config.php");

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);
    $rePassword = md5($_POST['rePassword']);
    $sql = "INSERT INTO users(name,email,phone,address,username,password,id_role) VALUES('$fullName','$email','$phone','$address','$username','$password',2)";
    $query = mysqli_query($mysqli, $sql);
    if ($query) {
        $alert = "<script>alert('Đăng ký tài khoản thành công')</script>";
        echo $alert;
        echo "<script> window.location.href='login.php' </script>";
    }
}

if (isset($_POST['userName'])) {
    $userName = $_POST['userName'];
    $passWord = md5($_POST['passWord']);
    $sql = "SELECT * FROM users WHERE username='$userName'";
    $query = mysqli_query($mysqli, $sql);
    $data = mysqli_fetch_assoc($query);
    $checkUsername = mysqli_num_rows($query);
    if ($checkUsername == 1) {
        $checkPass = $data['password'];
        if ($checkPass == $passWord) {
            $_SESSION['user'] = $data;
            header("Location:index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký & Đăng nhập</title>
    <!-- link icon  -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- link css  -->
    <link rel="stylesheet" href="./css/style-login.css">
    <!-- link font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<body>

    <div class="container">

        <!-- register start / đăng ký -->
        <div class="form-container register-container">
            <form method="POST" action="">
                <h1>Create Account</h1>
                <span>Register a new account </span>
                <input type="text" name="username" placeholder="Tên đăng nhập">
                <input type="text" name="fullName" placeholder="Họ và Tên">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="phone" placeholder="Số điện thoại">
                <input type="text" name="address" placeholder="Địa chỉ">
                <input type="password" name="password" placeholder="Mật khẩu">
                <input type="password" name="rePassword" placeholder="Nhập lại mật khẩu">
                <button name="register">Đăng Ký</button>
            </form>
        </div>
        <!-- register ends -->

        <!-- sign in start  -->
        <div class="form-container sign-in-container">
            <form method="POST" action="">
                <h1>Welcome to <br> Green Place Map</h1>
                <div class="icon-img">
                    <i class='icon-map bx bx-map'></i>
                    <img src="./css/img/m2.png" alt="" width="12%">
                </div>
                <input type="text" name="userName" placeholder="Username">
                <input type="password" name="passWord" placeholder="Password">
                <!-- <a href=""><b><i>Quên mật khẩu?</i></b></a> -->
                <button name="login">Đăng Nhập</button>
            </form>
        </div>
        <!-- sign in ends  -->

        <!-- overlay start / lớp phủ -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel left">
                    <h1>Do you have a Green Place Map account?</h1>
                    <p>Click Sign In to go back to login</p>
                    <button class="signIn">Sign In</button>
                </div>
                <div class="overlay-panel right">
                    <h1>Do not have an account?</h1>
                    <p>Click Sign Up to create a new account </p>
                    <button class="signUp">Sign Up</button>
                </div>
            </div>
        </div>
        <!-- overlay ends -->
    </div>

    <script src="./js/script-login.js"></script>
</body>

</html>