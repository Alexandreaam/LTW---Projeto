<html>
<body>
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
</section>
<form method="post" id="createlist">
    <input type="submit" name="Create" id="Create" value="Create List" /><br/>
</form>
<input type="submit" name="Delete" id="Delete" value="Delete List" /><br/>
<select id="del">
    <option>Select one to Delete</option>
</select>
<?php
echo "<br/>";
if(array_key_exists('Create',$_POST)){
    LogOut($user);
    header("Location: http://gnomo.fe.up.pt/~up201404422/Projeto/ListCreationPage.php"); /* Redirect browser */
    exit();
}
$id_lists = UserLists($user);
if(NumberOfLists($user) > 0){
    echo "Lists: <br/>";
}
foreach ($id_lists as $id_list) {
    echo GetListName($id_list['id_list']);
    $resource = newt_button ("Delete");
    echo "<br/>";
}
?>

</body>
</html> 
