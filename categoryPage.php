<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>You Made It</title>
    </head>
    <body>
        <h1>Category Results</h1>
        <?php
            echo 'Category: ' . htmlspecialchars($_GET["category"]);
        ?>
    </body>
</html>
