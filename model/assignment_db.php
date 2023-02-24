<?php

function get_assignments_by_course($course_id){
    global $db;
    if($course_id){
        $query = 'SELECT A.ID, A.Description, C.CourseName, C.CourseID FROM assignments A
        LEFT JOIN courses C ON A.CourseID = C.CourseID
        WHERE A.CourseID = :course_id ORDER BY A.ID';
    } else {
        $query = 'SELECT A.ID, A.Description, C.CourseName, C.CourseID FROM assignments A
        LEFT JOIN courses C ON A.CourseID = C.CourseID
        ORDER BY A.ID';
    }
        $statement = $db-> prepare($query);
        if ($course_id) {
            $statement->bindValue(":course_id", $course_id);
        }
        $statement->execute();
        $assignments = $statement->fetchAll();
        $statement->closeCursor();
        return $assignments;

    
}
function delete_assignments($assignment_id){
    global $db;
    $query = 'DELETE FROM assignments
    WHERE ID = :assignment_id';
    $statement = $db-> prepare($query);
    $statement->bindValue(":assignment_id", $assignment_id);
    $statement->execute();
    $statement->closeCursor();
}
function add_assignments($course_id,$description){
    global $db;
    $query = 'INSERT INTO assignments (CourseID, Description) VALUES (:CourseID, :description)';
    $statement = $db-> prepare($query);
    $statement->bindValue(":description", $description);
    $statement->bindValue(":CourseID", $course_id);
    $statement->execute();
    $statement->closeCursor();
}
?>