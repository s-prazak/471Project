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
            $db = "project_database";           //your database name
            
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
            echo "Amount Requested: " . $row["Requested_Count"] . "<br><br>";
            
            $stock = $row["Stock"];
            echo "<form action=\"productPage.php?product=$product\" method=\"post\">
                    Requested buy quantity (maximum of 10):
                    <input type=\"number\" name=\"quantity\" min=\"0\" max=\"10\">
                    <input type=\"submit\">
                  </form>";
            
            echo "<br><br><a href='productPage.php?product=$product&restock=true'>Restock</a>";
            
            if($_GET){
                if(isset($_GET['restock'])){
                    restock();
                }
            }
            
            $quantity = $_POST["quantity"];
            if ($quantity != null) {
                
                if ($stock >= $quantity) {
                    $stock = $stock - $quantity;
                    $sql = "UPDATE Product SET Stock = " . $stock . " WHERE Id = " . $row["Id"];

                    if ($conn->query($sql) === TRUE) {
                        $sql = "SELECT * FROM product WHERE Name = \"" . $product . "\"";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $sql = "INSERT INTO `order` VALUES(DEFAULT, 'Address')";
                        if (($conn->query($sql)) === true) {

                        }
                        else {
                            echo "Error: " . $conn->error;
                        }
                        $sql = "SELECT Id FROM `order` ORDER BY Id DESC";
                        $result = $conn->query($sql);
                        $orderId = $result->fetch_assoc();
                        $sql = "INSERT INTO buys VALUES($quantity, " . $row["Id"] . ", " .$orderId["Id"]. ")";
                        if (($conn->query($sql)) === true) {

                        }
                        else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        //header("Refresh:0");
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                else {
                    $newCount = $row["Requested_Count"] + $quantity - $stock;
                    $update_count = "UPDATE Product SET Requested_Count = " . $newCount . " WHERE Id = " . $row["Id"];
                    $update_stock = "UPDATE Product SET Stock = 0 WHERE Id = " . $row["Id"]; // set stock to 0
                    
                    $result_count = $conn->query($update_count);
                    $result_stock = $conn->query($update_stock);
                    
                    if (($result_count === TRUE) && ($result_stock === TRUE)) {
                        $sql = "SELECT * FROM product WHERE Name = \"" . $product . "\"";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        
                        $sql = "INSERT INTO `order` VALUES(DEFAULT, 'Address')";
                        if (($conn->query($sql)) === true) {

                        }
                        else {
                            echo "Error: " . $conn->error;
                        }
                        $sql = "SELECT Id FROM `order` ORDER BY Id DESC";
                        $result = $conn->query($sql);
                        $orderId = $result->fetch_assoc();
                        $sql = "INSERT INTO requests VALUES($quantity, " . $row["Id"] . ", " .$orderId["Id"]. ")";
                        if (($conn->query($sql)) === true) {

                        }
                        else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        
                        header("Refresh:0");
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
            
            function restock() {
                // Get usual stock
                global $conn, $row, $stock;
                $query_usual = "SELECT Usual_Stock_Supplied  FROM supplier WHERE supplier.Name = \"" . $row["Supplier_Name"] . "\"";
                $result_usual = $conn->query($query_usual);
                $usualStock = $result_usual->fetch_assoc();
                $stock += $usualStock["Usual_Stock_Supplied"] + $row["Requested_Count"];
                
                // Update stock and requested count
                $update_count = "UPDATE Product SET Stock = " . $stock . " WHERE Id = " . $row["Id"];
                $update_stock = "UPDATE Product SET Requested_Count = 0 WHERE Id = " . $row["Id"]; // set count to 0
                
                $result_count = $conn->query($update_count);
                $result_stock = $conn->query($update_stock);
                
                if ($result_stock === TRUE && $result_count === TRUE) {
                    header("Refresh:0");
                }
                else {
                    echo "Failed to update stock<br>";
                }
            }
            
            $conn-> close();            // close the connection to database
        ?>
    </body>
</html>
