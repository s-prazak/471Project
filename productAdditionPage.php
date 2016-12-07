<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product Addition Page</title>
        <link rel="stylesheet" href="storeStyle.css">
    </head>
    <body>
        <h1>Product-Add Information</h1>
        <form action="productAdditionPage.php" method="get">
            Name:<br>
            <input type="text" name="name" id="name" required><br>
            Price:<br>
            <input type="text" name="price" id="price" required><br>
            Stock:<br>
            <input type="text" name="stock" id="stock" required><br>
            Category Name:<br>
            <input type="text" name="cat_name" id="cat_name" required><br>
            Supplier Name:<br>
            <input type="text" name="sup_name" id="sup_name" required><br>
            <input type="submit" value="Submit"><br>
        </form>
        
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
            
            if(isset($_GET['sup_name'])){
                
//                $sql = "SELECT Id, MAX(Id) FROM product";
//                $result = $conn->query($sql);
//                $row = $result->fetch_assoc();
                
//                echo $row["Id"];
//                $new_ID = ($row["Id"] + 1);
//                echo $new_ID;
                
                
                $sql="INSERT INTO `product` VALUES (DEFAULT, '" . $_GET['name'] . 
                        "', " . $_GET['price'] . ", " . $_GET['stock'] . ", 0, '" . $_GET['cat_name'] . "', '" . $_GET['sup_name'] . "')";
                

                if (($conn->query($sql)) === true) {
                    echo "Successfully added product<br>";
                }
                else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            
            $conn->close();
        ?>
        
    </body>
</html>

