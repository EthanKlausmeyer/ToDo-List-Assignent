<?php include ("view/header.php"); ?>
<section id="list" class="list">
    <header>
        <form action="." method="get" id="list_header_select" class="list__header__select">
            <input type="hidden" name="action" vlaue="list_assignments">
            <select name="course_id" required>
                <option value="0">View All</option>
                <?php foreach($courses as $course): ?>
                    <?php if($couse_id == $course['CourseID']) { ?>
                        <option value="<?= $course['CourseID'] ?>">
                        <?php } else { ?>
                        <option value="<?= $course['CourseID']?>">
                        <?php } ?>
                        <?= $course['CourseName']?>
                        </option>
                    <?php endforeach; ?>
            </select>
            <button>GO</button>
        </form>
    </header>
    <?php if ($assignments) { ?>
        <?php foreach ($assignments as $assignment) : ?>
            <div class="list_row">
                <p><?= $assignment['CourseName'] ?></p>
                <p><?= $assignment['Description'] ?></p>
            </div>
            <div class="list__removeItem">
                <form action="." method="post">
                    <input type="hidden" name="action" vlaue="delete_assignment">
                    <input type="hidden" name="assignment_id" vlaue="<?= $assignment['ID'] ?>">
                    <button>X</button>
                </form>
            </div>
            <?php endforeach; ?>
        <?php } else { ?>
            <br>
            <?php if($course_id) { ?>
                <p>No Assignments exists for this course yet.</p>
                <?php } else { ?>
                    <p>No assignments exists yet.</p>
                    <?php } ?>

            <?php } ?>
</section>
<section id="add" class="add">
    <h2>Add Assignments</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" vlaue="add_assignment">
        <div class="add_inputs">
                <label>Course: </label>
                <select name="course_id" required>
                    <option value="">Please select the Course</option>
                    <?php foreach($courses as $course) : ?>
                    <option value="<?= $course['CourseID']?>">
                        <?= $course['CourseName']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <label>Description</label>
                <input type="text" name="description" maxlength="120" placeholder="Assignment Description" required>
        </div>
        <div class="add_addItem">
            <button>Add Assignment</button>
        </div>
    </form>
</section>
<p>
    <a href=".?action=list_courses">View/Edit Courses</a>
</p>
<?php include ("view/footer.php") ?>