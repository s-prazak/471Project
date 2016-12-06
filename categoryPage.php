<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search Results</title>
        <link rel="stylesheet" href="storeStyle.css">
    </head>
    <body>
        <h1>Category Results</h1>
        <?php
            echo 'Category: ' . htmlspecialchars($_GET["category"]);
            
                                    // put your code here
            $servername = "localhost";          //should be same for you
            $username = "root";                 //same here
            $password = "admin123";             //your localhost root password
            $db = "project_database";                     //your database name
            
            $conn = new mysqli($servername, $username, $password, $db);
            
            if($conn->connect_error){
                die("Connection failed".$conn->connect_error);
            }
            
            $nameholder = htmlspecialchars($_GET["category"]);
            $sql = "SELECT Id, Name, Price FROM product WHERE Category_Name = \"" .$nameholder ."\"";
            echo "<br><br>Products:<br>";
            $result = $conn->query($sql);       //execute the query
            
            if($result->num_rows >0){           //check if query results in more than 0 rows
                while($row = $result->fetch_assoc()){   //loop until all rows in result are fetched
                    $holder = $row["Name"];
                    echo "ID: " . $row["Id"];
                    echo " Name: "."<a href = categoryPage.php?category=$holder>".$row["Name"]."</a>"; //here we are looking at one row, and printing the value in "names" column
                    echo " Price $" . $row["Price"] . "<br>";                    
                }
            }
            
            $conn-> close();
        ?>
    </body>
</html>
