<?php
$show = false;
$success = false;
$fail = false;
$notfound = false;
session_start();
if (isset($_SESSION['name'])) {
    header('Location: main.php');
    exit;
}
require_once 'datastore.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $show = true;
    if (id_exists($id)) {
        if (match_login($id, $password)) {
			$user = get_user($id);
            $_SESSION['name'] = $user['name'];
            $_SESSION['id'] = $id;
            $success = true;
            header('Location: main.php');
            exit;
        } else {
            $fail = true;
        }
    } else {
        $notfound = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Login</title>
</head>
<body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>
			<form class="login-form" action='' method='POST'>
				<div class="control-group">
                    <input type="text" class="login-field" value="" placeholder="User ID" name='id'
                    required
						id="login-name">
					<label class="login-field-icon fui-user" for="login-name"></label>
				</div>
				<div class="control-group">
                    <input type="password" name='password' required class="login-field" value="" placeholder="Password"
                    required
						id="login-pass">
					<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>
				<div class="control-group">
				<input class="btn btn-primary btn-large btn-block" type='submit' required value='Login'>
				</div>
                <?php
if ($show) {
    if ($success) {echo "<span style='color:green'>Success!</span>";
    }
    if ($fail) {
        echo "<span style='color:red'>User id or password is invalid.</span>";
    }
}
if ($notfound) {
    echo "<span style='color:red'>User not found.</span>";
}?>

						<div class="control-group">
						<a href="signup.php">Sign Up</a>
						</div>
			</form>
		</div>
	</div>
</body>
</html>