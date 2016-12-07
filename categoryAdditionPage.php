<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Category Addition Page</title>
        <link rel="stylesheet" href="storeStyle.css">
    </head>
    <body>
        <h1>Category-Add Information</h1>
        <form action="categoryAdditionPage.php" method="get">
            Name:<br>
            <input type="text" name="name" id="name" autofocus required><br>
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
            
            if(isset($_GET['name'])){
                
                $sql="INSERT INTO `category` VALUES ('". $_GET['name'] ."')";

                if (($conn->query($sql)) === true) {
                    echo "Successfully added category<br>";
                }
                else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $sql="INSERT INTO has VALUES ('Amazon', '" . $_GET['name'] ."')";
                $result=$conn->query($sql);
            }
            
            $conn->close();
        ?>
        
    </body>
</html>


