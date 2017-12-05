<html>
<body>
<section id="Greeting">
    Logged-in as
    <?php
    session_start ();
    include_once('LogFunctions.php');
    $user = $_SESSION['currentuser'];
    echo $user;
    echo "<br/>";
    ?>
</section>
<section>
    <?php
    if(array_key_exists('Logout',$_POST)){
        LogOut($user);
        header("Location: http://gnomo.fe.up.pt/~up201404422/Projeto/loginpage.php"); /* Redirect browser */
        exit();
    }
    ?>
    <form method="post" id="logoutbutton">
        <input type="submit" name="Logout" id="Logout" value="LogOut" /><br/>
    </form>
    <ul id="createlistfields">
        <h1>Create your new list by chosing its basic components</h1>
        <form id="regform" action="ListCreation.php" method="POST">
            <li><label>Name of the list<input type="text" name="name" required="required"></label></li>
            <li><label>Color<input type="color" name="color"></label></li>
            <li><label>Category<input type="text" name="category" required="required"></label></li>
            <li><label>Due Date <input type="date" name="duedate" ></label></li>
            <input type="submit">
        </form>
    </ul>
</section>
</body>
</html>
