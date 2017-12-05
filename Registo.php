<html>
<body>
	<?php
    session_start ();
    include_once('LogFunctions.php');
    $db = new PDO('sqlite:servidor.db');
    $email = $_POST["email"];
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $date = $_POST["date"];
    $_SESSION['currentuser'] = $user;
    if(!UserExists($user)) {
        $stmt = $db->prepare("INSERT INTO users (username,email,password,dateofbirth,state,n_lists) VALUES(:user,:email,:pass,:date,1,0)");
        if (!$stmt) {
            echo "Invalid Database Query";
            echo "<br/>";
        } else {
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $pass);
            $stmt->bindParam(':date', $date);
            $stmt->execute();
        }
        header("Location: http://gnomo.fe.up.pt/~up201404422/Projeto/index.php"); /* Redirect browser */
        exit();
    }
    else {
        header("Location: http://gnomo.fe.up.pt/~up201404422/Projeto/loginpage.php"); /* Redirect browser */
        exit();
    }
	?>
</body>
</html> 