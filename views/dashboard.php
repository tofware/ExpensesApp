<!doctype html>
<html lang="en">
<head>
    <?php
    include("includes/head-tag-content.php");
    include("includes/logged-in-check.php");
    ?>
</head>
<body>
<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="d-flex flex-column card text-center custom-card">
        <h2>Incomes and Expenses</h2>
        <div class="row align-items-center justify-content-center">
            <a href="add-incomes.php" class="m-2">Add incomes</a>
            <a href="main-categories.php" class="m-2">Add categories</a>
            <a href="add-expenses.php" class="m-2">Add expenses</a>
        </div>
        <div class="row">
            <div class="col card m-5">
                <h3>Incomes</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nr.</th>
                            <th scope="col">Value</th>
                            <th scope="col">Note</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        require("../app/database/incomes/get-data.php");

                        $incomes = indexIncomes();

                        foreach ($incomes as $income){
                            echo '<tr>';
                            echo '<th scope="row">' . $income['id'] . '</th>';
                            echo '<td>' . $income['value'] . '</td>';
                            echo '<td>' . $income['note'] . '</td>';
                            echo '<td>' . $income['date'] . '</td>';
                            echo '</tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col card m-5">
                <h3>Expenses</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nr.</th>
                        <th scope="col">Value</th>
                        <th scope="col">Note</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require("../app/database/expenses/get-data.php");

                    $expenses = indexExpenses();

                    foreach ($expenses as $expense){
                        echo '<tr>';
                        echo '<th scope="row">' . $expense['id'] . '</th>';
                        echo '<td>' . $expense['value'] . '</td>';
                        echo '<td>' . $expense['note'] . '</td>';
                        echo '<td>' . $expense['date'] . '</td>';
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