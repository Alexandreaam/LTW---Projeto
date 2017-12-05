<?php
session_start ();
$user = $_SESSION['currentuser'];
include_once('ListFunctions.php');
$list_name = $_GET["list_name"];
$id_list = GetListId($list_name);
DeleteList($id_list);
RemoveListUser($user,NumberOfLists($user));
header("Location: http://gnomo.fe.up.pt/~up201404422/Projeto/MainMenu.php"); /* Redirect browser */
exit();
?>