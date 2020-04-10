<?php
require_once 'datastore.php';
$users = get_all_users();

function show_attr($attr)
{
    global $users;
    foreach ($users as $user) {
        echo "User " . $attr . " = " . $user[$attr] . PHP_EOL;
    }
}

function show_key()
{
    global $users;
    foreach ($users as $user) {
        echo $user->key();
        echo "<br>";
    }
}
function show_key1()
{
    global $users,$store,$user_kind;
    foreach ($users as $user) {
        echo $user['id'];
        echo '<br>';
        var_dump(get_object_vars($user->key()));
        echo "(1)<br>";
        echo ($user->key()==5701666712059904);
        echo "(2)<br>";
        echo ($user->key()=='5701666712059904');
        echo "(3)<br>";

        echo ($user->key()=='user:5701666712059904');
        echo "(4)<br>";

        echo ($user->key()==$store->key($user_kind,'5701666712059904'));
        echo "(5)<br>";
        echo ($user->key()==$store->key($user_kind,5701666712059904));
        echo "(6)<br>";
    }
}
echo '<br>';
$task = $store->entity($user_kind,[
    'id'=>'',
    'name'=>'Okkey',
    'password'=>'Password'
]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <div class='login-form'>
    <ul>
    <?php
foreach ($users as $user) {
    echo "<li class='form-group'><a class='login-field'>User Id=" . $user['id'] . " Name=" . $user['name'] . " Pass=" . $user['password'] . "</a></li>";
}
?>
    <?php
// try {
//     show_key();
// } catch (Exception $e) {
//     echo "Error when show attr key";
// }
try {
    show_key1();
} catch (Exception $e) {
    echo "Error when show key";
}
?>
    </ul>
    </div>
</head>
<body>

</body>
</html>