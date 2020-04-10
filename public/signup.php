<?php
require_once 'datastore.php';
$error_uid = false;
$error_password = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['uid'];
    $name = $_POST['name'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    if (id_exists($id)) {
        $error_uid = true;
    } else {
        if ($pass1 != $pass2) {
            $error_password = true;
        } else {
            create_user($id, $name, $pass1);
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            header('Location: main.php');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.php"> -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Sign Up</title>
</head>

<body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
                <h1>Sign Up</h1>
                <h3>
                    <?php
// $name = $name ? $name:"New User";
echo "Hi, please register";
?>
                </h3>
			</div>


			<form class="login-form" action='' method='POST'>
            <div class="control-group">
			<?php
if ($error_uid) {
    echo "<span style='color:red'>User Id has been used.</span>";
} else {

}
?>
            <input type="text" class="login-field"
				value=""
				placeholder="Id"
				name='uid'
				required
				id="login-name">
					<label class="login-field-icon fui-user" for="login-name"></label>
            </div>


            <div class="control-group">
            <input type="text" class="login-field"
				value=""
				placeholder="Name"
				name='name'
				required
				id="login-name">
					<label class="login-field-icon fui-user" for="login-name"></label>

            </div>
				<div class="control-group">
         		<input type="password" class="login-field"
				value=""
				placeholder="Set Password"
				name='pass1'
				pattern='[0-9]+'
				title='Only integer accept.'
				required
				id="login-name">
					<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field"
				value=""
				placeholder="Repeat Password"
				name='pass2'
				pattern='[0-9]+'
				title='Only integer accept.'
				required
				id="login-name">
					<label class="login-field-icon fui-user" for="login-name"></label>
                    <?php
if ($error_password) {
    echo "<span style='color:red'>Passwords should be same.</span>";
}
?>

                </div>
				<div class="control-group">
				<input class="btn btn-primary btn-large btn-block" type='submit' required value='Sign Up'>
                </div>
                <div class="control-group">
                <a href="/">Login</a>
                </div>
			</div>
			</form>
		</div>
	</div>
	<script>
	</script>
</body>
</html>