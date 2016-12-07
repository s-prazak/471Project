<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="storeStyle.css">
        <title>Hello</title>
    </head>
    <body>
        <h1>Store Front</h1>
        <form action="searchPage.php"> Search Bar:<br>
            <input type="text" name="search"><br>
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
            
            //sql query
            //$sql = "INSERT INTO names (names) VALUES ('John')";
            //echo "<br><br>Inserting  into db: ";
            //if($conn->query($sql)==TRUE){       //try executing the query 
            //    echo "Query executed<br>";
            //}
            //else{
            //    echo "Query did not execute<br>";
            //}
            
            //sql query
            $sql = "SELECT Name FROM category";
            echo "<br><br>";
            echo "<p style='font-family:impact;'>"." Categories:"."</p>";
            $result = $conn->query($sql);       //execute the query
            
            if($result->num_rows >0){           //check if query results in more than 0 rows
                while($row = $result->fetch_assoc()){   //loop until all rows in result are fetched
                    $holder = $row["Name"];
                    echo "Name: "."<a href = categoryPage.php?category=$holder>".$row["Name"]."</a>"."<br>"; //here we are looking at one row, and printing the value in "names" column
                }
            }
            
            $conn-> close();            //close the connection to database
        ?>
        <br><br><br><br><br>
        <a href="loginPage.php">Admin Login</a>
    </body>
</html>
