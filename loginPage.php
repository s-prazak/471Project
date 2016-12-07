<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
		 <link rel="stylesheet" href="storeStyle.css">
    </head>
    <body>
        <h1>Login</h1>
        <form>
            Username:<br>
        <input type="text" name="username" id="username" required><br>
            Password:<br>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Submit" onclick="return checkLogin()"><br>
        </form>
    </body>
</html>

<script type="text/javascript">
    checkLogin = function() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if(username === 'admin' && password === 'admin') {
            location.href = 'adminPage.php';
            return false;
        }
        else {
            alert("Invalid login information, please try again.");
        }
    }
</script>

