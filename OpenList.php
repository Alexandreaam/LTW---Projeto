<!DOCTYPE html>
<>
<?php
session_start();
$user = $_SESSION['currentuser'];
include_once('LogFunctions.php');
include_once('ListFunctions.php');
$name = $_GET["list_name"];
$id_list=GetListId($name, GetUserId($user));
$list_info=GetListInfo($id_list);
$date= $list_info['dateofcreation'];
$duedate= $list_info['duedate'];
$color=$list_info['color'];
$category= $list_info['category'];

echo '<form method="post" id="logoutbutton">';
echo '<input type="submit" name="Logout" id="Logout" value="Back" /><br/>';
echo '</form>';
echo '<h1>'."List: ".$name.'</h1>';
echo '<h3 style="background-color:red;">'."Made on: ".$date.'</h3>';
if(array_key_exists('Logout',$_POST)){
    header("Location: http://gnomo.fe.up.pt/~up201404422/Projeto/index.php"); /* Redirect browser */
    exit();
}

?>