<?php

function get_items(){
    global $db;
    $query = 'SELECT * FROM todoitems ORDER BY ItemNum';
    $statement = $db-> prepare($query);
    $statement->execute();
    $items = $statement->fetchALL();
    $statement->closeCursor();
    return $items;
}
// function get_item_name($item_num){
//     global $db;
//     if(!$item_num) {
//         return "All Items";
//     }
//     $query = 'SELECT * FROM todoitems WHERE ItemNum  = :item_num';
//     $statement = $db-> prepare($query);
//     $statement->bindValue(':item_num', $item_num);
//     $statement->execute();
//     $item = $statement->fetch();
//     $statement->closeCursor();
//     $item_name = $item['Title'];
//     return $item_name;
// }
function delete_item ($item_num){
    global $db;
    $query = 'DELETE FROM todoitems WHERE ItemNum = :item_num';
    $statement = $db-> prepare($query);
    $statement->bindValue(':item_num', $item_num);
    $statement->execute();
    $statement->closeCursor();
}
function add_item($title, $description){
    global $db;
    $query = 'INSERT INTO todoitems (Title, Description) VALUES ( :title, :description)';
    $statement = $db-> prepare($query);
    $statement->bindValue(":title", $title);
    $statement->bindValue(":description", $description);
    $statement->execute();
    $statement->closeCursor();
}
?>