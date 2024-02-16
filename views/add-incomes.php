<!doctype html>
<html lang="en">
<head>
    <?php
    include("includes/head-tag-content.php");
    include("includes/logged-in-check.php");

    function checkSession($field){
        if (!empty($_SESSION[$field])) {
            $message = $_SESSION[$field];
            unset($_SESSION[$field]);
            echo $message;
        }
    }
    ?>
</head>
<body>
<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="d-flex flex-column card text-center custom-card">
        <div class="row align-items-center justify-content-center">
            <a href="dashboard.php" class="m-2">Back to dashboard</a>
        </div>
        <form action="../app/database/incomes/add-income.php" method="post">
            <h1>Add Income</h1>
            <div>
                <label class="d-block mt-3" for="value">Value</label>
                <input class="d-block" type="number" name="value" required>
                <?php
                checkSession('value-message');
                ?>
            </div>
            <div>
                <label class="d-block mt-3" for="note">Note</label>
                <input class="d-block" type="text" name="note" required>
                <?php
                checkSession('note-message');
                ?>
            </div>
            <div>
                <label class="d-block mt-3" for="date">Date</label>
                <input class="d-block" type="date" name="date" required>
            </div>
            <div>
                <label class="d-block mt-3" >Category</label>
                <select class="d-block mt-3" name="category_id">
                    <option selected disabled>Choose a category</option>
                    <?php
                    require("../app/database/categories/get-data.php");

                    $level1Categories = retrieveAllLevel1Categories();

                    foreach ($level1Categories as $category){
                        echo '<option value="' . $category['id'] .'">' . $category['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button class="mt-3" type="submit">Add</button>
        </form>

    </div>
</div>
<?php include("includes/footer-tag-content.php") ?>
</body>
</html>