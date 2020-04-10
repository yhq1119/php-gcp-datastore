<?php
session_start();
$name;
if (!isset($_SESSION['name'])) {
    header('Location: /');
    exit;
} else {
    $name = $_SESSION['name'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.php"> -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Main</title>
</head>

<body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
                <h1>Functions</h1>
                <h3>
                    <?php
echo "Hi, " . $name . " !";
?>
                </h3>
			</div>

			<form class="login-form" action='' method='POST'>
				<div class="control-group">
				<a class="btn btn-primary btn-large btn-block" href='/name.php' >Change Name</a>
				</div>

				<div class="control-group">
				<a class="btn btn-primary btn-large btn-block" href='/password.php' >Change Password</a>
			    </div>
			</form>
		</div>
	</div>
	<script>
	</script>
</body>
</html>