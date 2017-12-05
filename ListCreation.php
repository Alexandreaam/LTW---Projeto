<?php
session_start ();
include_once('LogFunctions.php');
include_once('ListFunctions.php');
$user = $_SESSION['currentuser'];
$id_user = GetUserId($user);
$name = $_POST["name"];
$color = $_POST["color"];
$category = $_POST["category"];
$duedate = $_POST["duedate"];
CreateList($id_user,$name,$color,$category,$duedate);
AddListUser($user,NumberOfLists($user));
header("Location: http://gnomo.fe.up.pt/~up201404422/Projeto/index.php"); /* Redirect browser */
exit();
?>