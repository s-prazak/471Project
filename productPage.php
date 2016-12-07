<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product Page</title>
    </head>
    <body>
        <?php
            $product = htmlspecialchars($_GET["product"]);
            echo "<h1>" . $product . "</h1>";
            
            // put your code here
            $servername = "localhost";          //should be same for you
            $username = "root";                 //same here
            $password = "admin123";             //your localhost root password
            $db = "project_database";                     //your database name
            
            $conn = new mysqli($servername, $username, $password, $db);
            
            if($conn->connect_error){
                die("Connection failed".$conn->connect_error);
            }
            
            $sql = "SELECT Id, Price, Stock FROM product WHERE Name = \"" . $product . "\"";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            
            echo "ID: " . $row["Id"] . "<br>";
            echo "Price: " . $row["Price"] . "<br>";
            echo "Stock: " . $row["Stock"] . "<br><br>";
            
            $stock = $row["Stock"];
            echo "<form action=\"productPage.php?product=$product\" method=\"post\">
                    Requested Quantity:
                    <input type=\"number\" name=\"quantity\" min=\"0\" max=\"" . $stock . "\">
                    <input type=\"submit\">
                  </form>";
            
            $quantity = $_POST["quantity"];
            if ($quantity != null) {
                //echo "<br><br>Quantity entered was " . $quantity . "<br>";
                //echo "Stock is " . $stock . "<br>";
                $stock = $stock - $quantity;
                //echo "Updating quantity to " . $stock . "<br>";

                $sql = "UPDATE Product SET Stock = " . $stock . " WHERE Id = " . $row["Id"];
                if ($conn->query($sql) === TRUE) {
                    //echo "Stock updated successfully!<br>";
                }
                else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                
                $sql = "SELECT Id, Price, Stock FROM product WHERE Name = \"" . $product . "\"";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                header("Refresh:0");

                //echo "New stock is " + $row["Stock"];
            }
            
            $conn-> close();            // close the connection to database
        ?>
    </body>
</html>
