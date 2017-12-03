<?php
function GetUserId($user) {
    $db = new PDO('sqlite:servidor.db');
    if(UserExists($user)){
        $stmt = $db->prepare("SELECT id_user FROM users WHERE username = :user");
        if(!$stmt) {
            echo "Invalid Database Query";
            echo "<br/>";
        }
        else {
            $stmt->bindParam(':user', $user);
            $stmt->execute();
            $id = $stmt->fetch();
            return $id['id_user'];
        }
    }
    else {
        echo "User does not exist";
    }
}
function LogOut($user) {
    $db = new PDO('sqlite:servidor.db');
    if(UserExists($user)){
        $stmt = $db->prepare("UPDATE users SET state = 0 WHERE username = :user");
        if(!$stmt) {
            echo "Invalid Database Query";
            echo "<br/>";
        }
        else {
            $stmt->bindParam(':user', $user);
            $stmt->execute();
            //echo "User now offline";
        }
    }
    else {
        echo "User does not exist";
    }
}
function Login($user) {
    $db = new PDO('sqlite:servidor.db');
    if(UserExists($user)){
        $stmt = $db->prepare("UPDATE users SET state = 1 WHERE username = :user");
        if(!$stmt) {
            echo "Invalid Database Query";
            echo "<br/>";
        }
        else {
            $stmt->bindParam(':user', $user);
            $stmt->execute();
            //echo "User now online";
        }
    }
    else {
        echo "User does not exist";
    }

}
function RightPass($user, $pass) {
    $db = new PDO('sqlite:servidor.db');
    $stmt = $db->prepare("SELECT password FROM users WHERE username = :user");
    $stmt->bindParam(':user', $user);
    if(!$stmt) {
        echo "Invalid Database Query";
        echo "<br/>";
    }
    else {
        $stmt->execute();
        $prepass = $stmt->fetch();
    }
    if($pass == $prepass['password']) {
        //echo "Correct Pass";
        //echo "<br/>";
        return 1;
    }
    else {
        //echo "Wrong Pass";
        //echo "<br/>";
        return 0;
    }
}

function UserExists($user) {
    $db = new PDO('sqlite:servidor.db');
    $stmt = $db->prepare("SELECT username FROM users WHERE username = :user");
    $stmt->bindParam(':user', $user);
    if(!$stmt) {
        echo "Invalid Database Query";
        echo "<br/>";
    }
    else {
        $stmt->execute();
        $preuser = $stmt->fetch();
    }
    if($user == $preuser['username']) {
        //echo "Existent User";
        //echo "<br/>";
        return 1;
    }
    else {
        //echo "Nonexistent User";
        //echo "<br/>";
        return 0;
    }
}
?>
