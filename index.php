<?php
require("model/database.php");
require("model/todo_db.php");

$title = filter_input(INPUT_POST, "title", FILTER_UNSAFE_RAW);
$description = filter_input(INPUT_POST, "description", FILTER_UNSAFE_RAW);

$item_num = filter_input(INPUT_POST, "item_num", FILTER_VALIDATE_INT);
if (!$item_num) {
    $item_num = filter_input(INPUT_GET, "item_num", FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, "action", FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, "action", FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'list_items';
    }
}

switch ($action) {
    case 'get_items':
        $items = get_items();
        include('view/item_list.php');
        break;
    case "add_item":
        if ($title && $description) {
            add_item($title, $description);
            header("Location: .?action=get_items");
        } else {
            $error = "Invalid item data. Check all the feilds and try again";
            include('view/error.php');
            exit();
        }
        break;
    case "delete_item":
        if ($item_num) {
            try {
                delete_item($item_num);
            } catch (PDOException $e) {
                $error = "You can't delete a item if no items exist in the list!";
                include("view/error.php");
                exit();
            }
            header("Location: .?action=get_items");
        }
        break;
    case "delete_assignment":
        if ($item_num) {
            delete_assignments($item_num);
            header("Location: .?action=get_items");
        } else {
            $error = "Missing or incorrect Assignment ID";
            include("view/error.php");
        }
        break;

    default:
    $items = get_items();
    include('view/item_list.php');
}
