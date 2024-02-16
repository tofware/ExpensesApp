<!doctype html>
<html lang="en">
<head>
    <?php
    include("includes/head-tag-content.php");
    include("includes/logged-in-check.php");

    function checkSession($field)
    {
        if (!empty($_SESSION[$field])) {
            $message = $_SESSION[$field];
            unset($_SESSION[$field]);
            echo $message;
        }
    }

    if (isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];
    } else {
        header('Location: main-categories.php');
    }
    ?>
</head>
<body>
<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="d-flex flex-column card text-center custom-card">
        <h2>Add categories</h2>
        <div class="row align-items-center justify-content-center">
            <a href="main-categories.php" class="m-2">Back to main categories</a>
        </div>
        <div class="row">
            <form action="../app/database/categories/create-secondary-category.php" method="post">
                <label for="name" class="m-2">Category Name</label>
                <input  class="m-2" type="text" name="name"/>
                <?php
                checkSession('name-unique-message');
                checkSession('name-message');
                ?>
                <input  class="m-2" type="text" hidden name="parent_id" value="<?= $category_id ?>"/>
                <button  class="m-2" type="submit">Add</button>
            </form>
        </div>
        <div class="row">
            <div class="col card m-5">
                <h3>Secondary Categories</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nr.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        require("../app/database/categories/get-data.php");

                        if(isset($category_id)){
                            $categories = indexLevel1Categories($category_id);

                            foreach ($categories as $category){
                                echo '<tr>';
                                echo '<th scope="row">' . $category['id'] . '</th>';
                                echo '<td>' . $category['name'] . '</td>';
                                echo '<td>
                                      <form action="../app/database/categories/delete-secondary-category.php" method="POST">
                                          <input name="category_id" hidden value="' . $category['id'] . '">
                                          <button type="submit">Delete</button>
                                      </form>
                                      </td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer-tag-content.php") ?>
</body>
</html>