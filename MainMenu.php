<html>
<body>
<head>
    <meta charset="UTF-8">
    <title>To-Do Lists</title>
    <script src="MainMenuJS.js" defer></script>
</head>
<section id="welcome">
    Welcome
    <?php
    session_start ();
    include_once('LogFunctions.php');
    $user = $_SESSION['currentuser'];
    echo $user;
    echo " ID: ";
    echo GetUserId($user);
    echo "! <br/>";
    if(array_key_exists('Logout',$_POST)){
        LogOut($user);
        header("Location: http://gnomo.fe.up.pt/~up201404422/Projeto/FirstPage.html"); /* Redirect browser */
        exit();
    }
    ?>
</section>
<form method="post" id="logoutbutton">
    <input type="submit" name="Logout" id="Logout" value="LogOut" /><br/>
</form>
<section>
    You currently have:
    <?php
    include_once('ListFunctions.php');
    $user = $_SESSION['currentuser'];
    echo NumberOfLists($user);
    ?>
    list(s)!
</section>
<form method="post" id="createlist">
    <input type="submit" name="Create" id="Create" value="Create List" /><br/>
</form>
<select id="del">
    <option name="options" value="0">Select one to Delete</option>
</select>
<input type="button" value="Delete List" id="Delete List">
<?php
echo "<br/>";
if(array_key_exists('Create',$_POST)){
    LogOut($user);
    header("Location: http://gnomo.fe.up.pt/~up201404422/Projeto/ListCreationPage.php"); /* Redirect browser */
    exit();
}
?>
<section id="lists">
    <?php
    if(NumberOfLists($user) > 0){
    echo "Lists: <br/>";
    }
    ?>
</section>
<section id="list names">
<?php
    $id_lists = UserLists($user);
    echo '<ul>';
    foreach($id_lists as $id_list){
        echo '<li>'.GetListName($id_list['id_list']).'</li>';
    }
    echo '</ul>';
?>


</body>
</html> 
