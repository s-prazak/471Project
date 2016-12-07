<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="storeStyle.css">
        <title>Admin</title>
    </head>
    <body>
        <h1>Admin</h1>
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
            
            $product = htmlspecialchars($_GET["product"]);
            if($_GET){
                if(isset($_GET['delete'])){
                    deleteEntry();
                }
            }
            
            function deleteEntry(){
                global $product, $conn;
                $sql = "SELECT * FROM product WHERE Name = \"" . $product . "\"";
                $result1 = $conn->query($sql);
                $row = $result1->fetch_assoc();

                $deleteQuery = "DELETE FROM sells WHERE Product_Id=" . $row["Id"] . " and Store_Name=\"Amazon\"";
                if (($conn->query($deleteQuery)) === true) {
                   echo "<p style='color:red;'>"."Deleted Product #" . $row["Id"] . ", " . $row["Name"] . "<br>" . "</p>";
                }
                else {
                    echo "Error: " . $conn->error;
                }
            }
            
            $conn-> close();       
        ?>
        
         <form action="deletePage.php"> Search for Products to Delete:<br>
            <input type="text" name="search"><br>
            <input type="submit" value="Submit"><br>
         </form><br>
        <a style="font-family:helvetica;" href="productAdditionPage.php">Add a Product</a><br><br>
        <a style="font-family:helvetica;" href="categoryAdditionPage.php">Add a Category</a><br><br>
        <a style="font-family:helvetica;" href="supplierAdditionPage.php">Add a Supplier</a> <br><br>
    </body>
</html>