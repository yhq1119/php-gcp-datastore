<?php
require 'vendor/autoload.php';
use Google\Cloud\Datastore\DatastoreClient;
$store = new DatastoreClient([
    'projectId'=>'rmit-cc-2020-a1'
    ]);
$user_kind = 'user';

function id_exists($id){
    return (null!=get_user($id));
}

function get_user($id){
    global $store, $user_kind;
    $key = $store->key($user_kind,$id);
    return $store->lookup($key);
}

function create_user($id,$name,$password){
    global $store,$user_kind;
    $key = $store->key($user_kind,$id);
    $user = $store->entity($key,[
        'id'=>$id,
        'name'=>$name,
        'password'=>$password
    ]);
    $store->upsert($user);
}

function match_login($id, $password){
   $user = get_user($id);
    if(null==$user){
        return false;
    } else{
        return ($user['password']==$password);
    }
}
function change_name($id,$name){
    global $store;
    $user = get_user($id);
    $user['name'] = $name;
    $store->update($user);
}

function update_prop($id,$key_name,$key_value){
    global $store;
    $user = get_user($id);
    $user[$key_name] = $key_value;
    $store->update($user);
}

function get_all_users(){
    global $store, $user_kind;
    $query = $store->query()->kind($user_kind);
    return $store->runQuery($query);
}
?>