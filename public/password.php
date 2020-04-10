<?php
session_start();
if(!isset($_SESSION['name'])){
	header('Location: /');
	exit;
}
require_once('datastore.php');
$name = $_SESSION['name'];
$id = $_SESSION['id'];
$wrong=false;
$success=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(match_login($id,$_POST['oldpass']))
	{
		update_prop($id,'password',$_POST['newpass']);
			// $_SESSION['password']=$_POST['newpass'];
			$success = true;
			session_destroy();
			header('Location: /');
			exit;
		}
	else{
		$wrong=true;
	}
}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	echo '<link rel="stylesheet" type="text/css" href="css/style.css">'
	?>
	<title>Password</title>
</head>

<body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Change Password</h1>
				<h3>
					<?php
					echo "Hi, ".$name.", you can change password here."
					?>
				</h3>
			</div>

			<form class="login-form" action='' method='POST'>
				<div class="control-group">
				<input type="password" class="login-field" 
				value="" 
				placeholder="Old Password" 
				name='oldpass'
				pattern='[0-9]+'
				title='Only integer accept.'
				required		
				id="login-name">
					<label class="login-field-icon fui-user" for="login-name"></label>
				</div>
				<?php
				if($wrong){
					echo "<span style='color:red'>User password is incorrect.</span>";
				}
				if($success){
					echo "<span style='color:green'>Password changed.</span>";
				}
				?>
				<div class="control-group">
				<input type="password" class="login-field" 
				value="" 
				placeholder="New Password" 
				name='newpass'
				pattern='[0-9]+'
				title='Only integer accept.'
				required		
				id="login-name">
					<label class="login-field-icon fui-user" for="login-name"></label>
				</div>
				<div class="control-group">
				<input class="btn btn-primary btn-large btn-block" type='submit' required value='Change'>
			</div>
			</form>
		</div>
	</div>
	<script>
	</script>
</body>
</html>