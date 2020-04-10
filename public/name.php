<?php
require_once('datastore.php');
session_start();
if(!isset($_SESSION['name'])){
	header('Location: /');
	exit;
}
$empty=false;
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if($_SERVER['REQUEST_METHOD']=='POST'){

	if(empty($_POST['newname'])){
		$empty = true;
	}else{
		update_prop($id,'name',$_POST['newname']);
		// $key = $store->key('user',$id);
		// $transaction = $store->transaction();
		// // $key = $datastore->key('Task', 'sampleTask');
		// $task = $transaction->lookup($key);
		// $task['name'] = $_POST['newname'];
		// $transaction->update($task);
		// $transaction->commit();
		// $name = $_POST['newname'];
		$_SESSION['name']=$_POST['newname'];
		header('Location: main.php');
		exit;
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
	<title>Rename</title>
</head>

<body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Edit Name</h1>
				<h3>
					<?php
					echo "Hi, ".$name.", you can rename here."
					?>
				</h3>
			</div>

			<form class="login-form" action='' method='POST'>
				<div class="control-group">
				<input type="text" class="login-field" value="" placeholder="New Name" name='newname'
						id="login-name">
					<label class="login-field-icon fui-user" for="login-name"></label>
					<?php
					if($empty){
						echo "<span style='color:red'>User name cannot be empty.</span>";
					}
					?>
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