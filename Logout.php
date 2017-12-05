<html>
<body>
<?php
session_start ();
include_once('LogFunctions.php');
$user = $_SESSION['currentuser'];
LogOut($user);
header("Location: http://gnomo.fe.up.pt/~up201404422/Projeto/loginpage.php"); /* Redirect browser */
exit();
?>
</body>
</html>