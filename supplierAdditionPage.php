<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Supplier Addition Page</title>
        <link rel="stylesheet" href="storeStyle.css">
    </head>
    <body>
        <h1>Supplier-Add Information</h1>
        <form action="supplierAdditionPage.php" method="get">
            Name:<br>
            <input type="text" name="name" id="name" required autofocus=""><br>
            Usual Stock Supplied:<br>
            <input type="text" name="usual" id="usual" required><br>
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
            
            if(isset($_GET['usual'])){
                          
                $sql="INSERT INTO `supplier` VALUES ('" . $_GET['name'] . "', " . $_GET['usual'] . ")";
                   
                if (($conn->query($sql)) === true) {
                    echo "Successfully added Supplier<br>";
                }
                else {
                    echo "Error: " . $conn->error;
                }
            }
            
            $conn->close();
        ?>
        
    </body>
</html>

