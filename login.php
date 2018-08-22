<?php

// require_once 'config.php';
require_once 'php_action/db_connect.php';

$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["username"]))) {
        $username_err = 'Please enter username.';
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST['password']))) {
        $password_err = 'Please enter your password.';
    } else {
        $password = trim($_POST['password']);
    }

    if (empty($username_err) && empty($password_err)) {

        $sql = "SELECT username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;

            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {

                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {

                            $mainSql = "SELECT * FROM users WHERE username = '$username'";
                            $mainResult = $connect->query($mainSql);

                            if ($mainResult->num_rows == 1) {
                                $value = $mainResult->fetch_assoc();
                                session_start();
                                $_SESSION['userId'] = $username;

                                $type = $value['account_type'];

                                if ($type == "manager") {

                                    header('location: dashboard.php');
                                } else if ($type == "dispatcher") {
                                    header('location: account_type/dashboard.php');
                                } else if ($type == "admin") {
                                    header('location: admin/index.php');
                                } else if ($type == "supplier") {
                                    header('location: supplier/dashboard.php');
                                }

                            }
                        } else {

                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else {

                    $username_err = 'No account found with that username.';
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <link rel="icon" type="image/png" href="warehouse.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>KMS Warehouse</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=RobotoDraft:300,500">
      <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }


    </style>
</head>

<div class="login">
 <header>
<img class="logo" src="warehouse.png"/>KMS Warehouse
</header>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="username" maxlength="50" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" maxlength="50" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login" style="background-color: #8274D8; width: 350px;">
            </div>
        </form>
<footer><a href="#" onclick="alert('Contact Administrator to change password!');">Forgot password</a></footer>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index.js"></script>

</body>
</html>