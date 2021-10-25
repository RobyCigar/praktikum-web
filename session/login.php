<?php
session_start();
//login.php
if (isset($_SESSION["username"])) {
    header("location:index.php");
}
$message = '';

if (isset($_POST["login"])) {
    var_dump("HERE");
    if (empty($_POST["user_email"]) || empty($_POST["user_password"])) {
        $message = "<div class='alert alert-danger'>Harus diisi semua</div>";
    } else {
        $username = "ferian@hyung.oppa";
        $password = "password";
        $type = "admin";
        if ($_POST["user_email"] == $username) {
            if ($_POST["user_password"] == $password) {
                $_SESSION['username'] = $_POST['user_email'];
                echo $_SESSION['username'];
                header("location: index.php");
            } else {
                $message = '<div class="alert alert-danger">salah paswet</div>';
            }
        } else {
            $message = "<div class='alert alert-danger'>salah imel</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Logout Pake Session</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <br />
    <div class="container">
        <h2 align="center">PHP Session</h2>
        <br />
        <div class="panel panel-default">

            <div class="panel-heading">Login</div>
            <div class="panel-body">
                <span><?php echo $message; ?></span>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="user_email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="user_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button name="login" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <br />
        <p>Imel atmin : ferian@hyung.oppa</p>
        <p>Paswet : password</p>
    </div>
</body>

</html>