<?php
session_start ();
$user = $_SESSION['currentuser'];
include_once('LogFunctions.php');
include_once('ListFunctions.php');
$list_name = $_GET["list_name"];
$id_user=GetUserId($user);
$id_list = GetListId($list_name, $id_user);
DeleteList($id_list);
RemoveListUser($user,NumberOfLists($user));
header("Location: http://gnomo.fe.up.pt/~up201404422/Projeto/index.php"); /* Redirect browser */
exit();
?>