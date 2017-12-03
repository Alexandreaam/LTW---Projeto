<html>
<body>
<?php
session_start ();
include_once('LogFunctions.php');
$user = $_POST["username"];
$pass = $_POST["password"];
$_SESSION['currentuser'] = $user;
if(RightPass($user,$pass)) {
    Login($user);
    header("Location: http://gnomo.fe.up.pt/~up201404422/Projeto/MainMenu.php"); /* Redirect browser */
    exit();
}
else {
    header("Location: http://gnomo.fe.up.pt/~up201404422/Projeto/FirstPage.html"); /* Redirect browser */
    exit();
}
?>
</body>
</html>