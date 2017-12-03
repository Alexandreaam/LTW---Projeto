<?php
function GetListName($id_list){
    $db = new PDO('sqlite:servidor.db');
    $stmt = $db->prepare("SELECT name FROM lists WHERE id_list = :id_list");
    if(!$stmt) {
        echo "Invalid Database Query";
        echo "<br/>";
    }
    else {
        $stmt->bindParam(':id_list', $id_list);
        $stmt->execute();
        $list_name = $stmt->fetch();
        return $list_name['name'];
    }
}
function UserLists($user){
    $db = new PDO('sqlite:servidor.db');
    if(UserExists($user)){
        $stmt = $db->prepare("SELECT id_list FROM users JOIN Lists ON users.id_user=lists.id_user WHERE username = :user");
        if(!$stmt) {
            echo "Invalid Database Query";
            echo "<br/>";
        }
        else {
            $stmt->bindParam(':user', $user);
            $stmt->execute();
            $id_lists = $stmt->fetchAll();
            return $id_lists;
        }
    }
    else {
        echo "User does not exist";
    }
}
function CreateList($id_user, $name, $color, $category, $duedate) {
    $db = new PDO('sqlite:servidor.db');
    $stmt = $db->prepare("INSERT INTO lists (id_user,name,dateofcreation,duedate,color,category) VALUES (:id_user,:name,:currdate,:duedate,:color,:category)");
    if(!$stmt) {
        echo "Invalid Database Query";
        echo "<br/>";
    }
    else {
        $currdate = date_default_timezone_get();
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':duedate', $duedate);
        //$stmt->bindParam(':currentdate', $currdate);
        $stmt->execute();
    }
}
function AddListUser($user, $currnlists){
    $db = new PDO('sqlite:servidor.db');
    if(UserExists($user)){
        $n_lists=$currnlists+1;
        $stmt = $db->prepare("UPDATE users SET n_lists = :n_lists  WHERE username = :user");
        if(!$stmt) {
            echo "Invalid Database Query";
            echo "<br/>";
        }
        else {
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':n_lists', $n_lists);
            $stmt->execute();
        }
    }
    else {
        echo "User does not exist";
    }
}
function RemoveListUser($user, $currnlists){
    $db = new PDO('sqlite:servidor.db');
    if(UserExists($user)){
        $n_lists=$currnlists-1;
        $stmt = $db->prepare("UPDATE users SET n_lists = :n_lists  WHERE username = :user");
        if(!$stmt) {
            echo "Invalid Database Query";
            echo "<br/>";
        }
        else {
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':n_lists', $n_lists);
            $stmt->execute();
        }
    }
    else {
        echo "User does not exist";
    }
}
function NumberOfLists($user) {
    $db = new PDO('sqlite:servidor.db');
    if(UserExists($user)){
        $stmt = $db->prepare("SELECT n_lists FROM users WHERE username = :user");
        if(!$stmt) {
            echo "Invalid Database Query";
            echo "<br/>";
        }
        else {
            $stmt->bindParam(':user', $user);
            $stmt->execute();
            $numb = $stmt->fetch();
            return $numb['n_lists'];
        }
    }
    else {
        echo "User does not exist";
    }
}
?>
