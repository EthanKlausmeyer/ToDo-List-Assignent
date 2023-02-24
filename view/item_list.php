<?php include('view/header.php') ?>


<?php if ($items) { ?>
    <section id="list" class="list">
        <header>
            <h1>ToDo List</h1>
        </header>
        <?php foreach($items as $item) : ?>
            <p style="font-weight: bold"><?= $item['Title']?></p>
            <p><?= $item['Description']?></p>
            <div class="list_item">
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_item">
                    <input type="hidden" name="item_num" value="<?= $item['ItemNum'] ?>">                   
                    <button>X</button>
                </form>
            </div>
        <?php endforeach; ?>
    </section>
    <?php } else { ?>
        <p>No Items Exist Yet</p>
        <?php } ?>

        <section>
            <h2>Add Item</h2>
            <form action="." method = "post" id="add_form" class="add_form">
                <input type="hidden" name="action" value="add_item">
                <div class="add_inputs">
                    <label>Task Name</label>
                    <input type="text" name="title" maxlength="20" placeholder="Task Name" autofocus required>
                    <label>Task Description</label>
                    <input type="text" name="description" maxlength="50" placeholder="Description" autofocus required>
                </div>
                <div class="add__addItem">
                    <button class ="add_button">Add Item</button>
                </div>
            </form>
        </section>



<?php include('view/footer.php') ?>