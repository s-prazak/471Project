<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>You Made It</title>
    </head>
    <body>
        <h1>Search Results</h1>
        <?php
            echo 'You searched for ' . htmlspecialchars($_GET["search"]);
        ?>
    </body>
</html>
