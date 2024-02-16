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
    ?>
</head>
<body>
<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="d-flex flex-column card text-center custom-card">
        <h2>Main Categories</h2>
        <div class="row align-items-center justify-content-center">
            <a href="dashboard.php" class="m-2">Back to dashboard</a>
        </div>
        <h5>Add new main category</h5>
        <div class="row">
            <form action="../app/database/categories/create-main-category.php" method="post">
                <label class="m-2">Category Name</label>
                <input  class="m-2" type="text" name="name"/>
                <?php
                checkSession('name-unique-message');
                checkSession('name-message');
                ?>
                <button  class="m-2" type="submit">Add</button>
            </form>
        </div>
        <div class="row">
            <div class="col card m-5">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nr.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Secondary Categories</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require("../app/database/categories/get-data.php");

                    $categories = indexLevel0Categories();

                    foreach ($categories as $category){
                        echo '<tr>';
                        echo '<th scope="row">' . $category['id'] . '</th>';
                        echo '<td>' . $category['name'] . '</td>';
                        echo '<td><a href="secondary-categories.php?category_id=' . $category['id'] . '">View</a></td>';
                        echo '<td>
                              <form action="../app/database/categories/delete-main-category.php" method="POST">
                                  <input name="category_id" hidden value="' . $category['id'] . '">
                                  <button type="submit">Delete</button>
                              </form>
                              </td>';
                        echo '</tr>';
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