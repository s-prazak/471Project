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
            $sql = "SELECT Id, Name, Price FROM product, sells WHERE Name LIKE '%$get_string%' "
                    . "AND Id = Product_Id AND Store_Name = 'Amazon' ";
            
            $result = $conn->query($sql);       //execute the query
            
            if($result->num_rows > 0){           //check if query results in more than 0 rows
                while($row = $result->fetch_assoc()){   //loop until all rows in result are fetched
                    //echo "Product ID:" . $row["Id"] . " - Name: " . $row["Name"] . "<br>";
                    $holder = $row["Name"];
                    echo "ID: " . $row["Id"];
                    echo "<a href = productPage.php?product=$holder>".$row["Name"]."</a>";
                    echo " Price $" . $row["Price"] . "<br>";
                }
            }
            
            $conn-> close();            // close the connection to database
        ?>
    </body>
</html>
