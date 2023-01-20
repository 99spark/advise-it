<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$error = "";

if($username == "admin" && $password == "adm1n")
{
    $_SESSION['admin'] = "admin";
    header("Location: https://afischer4.greenriverdev.com/advise-it/admin.php");
}
else{
    $error = true;
}


?>
<link rel="stylesheet" href="login.css">
<form method="post">
    <div id="login">
        <h1>Administrator Login</h1>
        <div id="user">
            <label for="username">Username:</label>
            <input id="username" name="username">
        </div>

        <div id="pass">
            <label for="password">Password:</label>
            <input id="password" name="password">
        </div>


        <br>

        <div id="button">
            <button id="adminButton" type="submit">Login</button>
        </div>


        <?php
            if(!empty($_POST) && $error)
            {
                echo "<p id='error'> Incorrect username or password. Try again! </p>";
            }

        ?>

    </div>

</form>
