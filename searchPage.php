<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search Results</title>
        <link rel="stylesheet" href="storeStyle.css">
    </head>
    <body>
        <?php
            // put your code here
            $servername = "localhost";          //should be same for you
            $username = "root";                 //same here
            $password = "admin123";             //your localhost root password
            $db = "project_database";                     //your database name
            
            $conn = new mysqli($servername, $username, $password, $db);
            
            if($conn->connect_error){
                die("Connection failed".$conn->connect_error);
            }
            
            $get_string = htmlspecialchars($_GET["search"]);
            echo 'You searched for ' . $get_string . "<br><br>";
            echo "Search results that correspond to your query:" . "<br>";
            $sql = "SELECT Name FROM product WHERE Name = \"" . $get_string . "\"";
            
            $result = $conn->query($sql);       //execute the query
            
            if($result->num_rows > 0){           //check if query results in more than 0 rows
                while($row = $result->fetch_assoc()){   //loop until all rows in result are fetched
                    echo "Product ID:" . $row["Id"] . " - Name: " . $row["Name"] . "<br>";
                }
            }
            
            $conn-> close();            // close the connection to database
        ?>
    </body>
</html>
