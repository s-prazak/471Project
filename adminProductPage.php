<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Product Page</title>
        <link rel="stylesheet" href="storeStyle.css">
    </head>
    <body>
        <?php
            $product = htmlspecialchars($_GET["product"]);
            echo "<h1>" . $product . " Information</h1>";
            
            // put your code here
            $servername = "localhost";          //should be same for you
            $username = "root";                 //same here
            $password = "admin123";             //your localhost root password
            $db = "project_database";                     //your database name
            
            $conn = new mysqli($servername, $username, $password, $db);
            
            if($conn->connect_error){
                die("Connection failed".$conn->connect_error);
            }
            
            $sql = "SELECT * FROM product WHERE Name = \"" . $product . "\"";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            
            echo "ID: " . $row["Id"] . "<br>";
            echo "Price: " . $row["Price"] . "<br>";
            echo "Stock: " . $row["Stock"] . "<br>";
            echo "Requested Count: " . $row["Requested_Count"] . "<br>";
            echo "Category: " . $row["Category_Name"] . "<br>";
            echo "Supplier: " . $row["Supplier_Name"] . "<br><br>";
            
            echo "<a href='adminPage.php?product=$product&delete=true'>Delete</a>";

            $conn-> close();            // close the connection to database
        ?>     
    </body>
</html>

