<?php
function GetListInfo($id_list){
    $db = new PDO('sqlite:servidor.db');
    $stmt = $db->prepare("SELECT name,dateofcreation,duedate,color,category FROM lists WHERE id_list = :id_list");
    if(!$stmt) {
        echo "Invalid Database Query";
        echo "<br/>";
    }
    else {
        $stmt->bindParam(':id_list', $id_list);
        $stmt->execute();
        $list_info = $stmt->fetch();
        return $list_info;
    }
}
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
function GetListId($name, $id_user){
    $db = new PDO('sqlite:servidor.db');
    $stmt = $db->prepare("SELECT id_list FROM lists WHERE name = :name AND id_user = :id_user");
    if(!$stmt) {
        echo "Invalid Database Query";
        echo "<br/>";
    }
    else {
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();
        $id_list = $stmt->fetch();
        return $id_list['id_list'];
    }
}
function UserLists($user){
    $db = new PDO('sqlite:servidor.db');
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
function CreateList($id_user, $name, $color, $category, $duedate) {
    $db = new PDO('sqlite:servidor.db');
    $stmt = $db->prepare("INSERT INTO lists (id_user,name,dateofcreation,duedate,color,category) VALUES (:id_user,:name,:currdate,:duedate,:color,:category)");
    if(!$stmt) {
        echo "Invalid Database Query";
        echo "<br/>";
    }
    else {
        $currdate = date("Y-m-d");
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':duedate', $duedate);
        $stmt->bindParam(':currdate', $currdate);
        $stmt->execute();
    }
}
function DeleteList($id_list) {
    $db = new PDO('sqlite:servidor.db');
    $stmt = $db->prepare("DELETE FROM lists WHERE id_list = :id_list");
    if(!$stmt) {
        echo "Invalid Database Query";
        echo "<br/>";
    }
    else {
        $stmt->bindParam(':id_list', $id_list);
        $stmt->execute();
    }
}
function AddListUser($user, $currnlists){
    $db = new PDO('sqlite:servidor.db');
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
function RemoveListUser($user, $currnlists){
    $db = new PDO('sqlite:servidor.db');
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
function NumberOfLists($user) {
    $db = new PDO('sqlite:servidor.db');
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
?>
