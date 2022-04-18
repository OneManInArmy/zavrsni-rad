<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@500&family=Arimo:wght@600&family=Bebas+Neue&family=Noto+Sans:wght@500&family=Oswald&family=Oxygen&family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" href="slike/servislogo.png">
    <script src="scripts.ts"></script>
    <title>RTV-Servis Marušić Login</title>
</head>
<body>
<div class="spacer" style="background-image: url('slike/Website Images/adminlogintop.svg')"></div>
    <script>
        function PreviousPage()
        {
            window.history.back();
        }
    </script>
    <div class="adminbox">
        <div class="backbutton">
            <a onclick="PreviousPage()"><span>&#8592;</span>Nazad</a>
        </div>
        <form action="" method="post" name="loginform" id="loginform">
            <div class="userinput">
                <label for="username">Korisničko ime: </label><br><input type="text" name="username" id="username">
            </div>
            <div class="userinput" style="padding: 5% 10% 5% 10%;">
                <label for="password">Lozinka: </label><br><input type="password" name="password" id="password">
            </div>
        </form>
        <div class="loginoutput">
            <?php
            session_start();
            include "functions.php";
            $conn=OpenCon();
            QueryDestroy();
            if($_SESSION['loggedin'] == TRUE)
            {
                header("location: adminshop.php?page=1");
            }
            if(isset($_POST["submit"])) {
                if ($stmt = $conn->prepare('SELECT `ID`, `Password` FROM `users` WHERE `Username` = ?')) {
                    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
                    $stmt->bind_param('s', $_POST['username']);
                    $stmt->execute();
                    // Store the result so we can check if the account exists in the database.
                    $stmt->store_result();
                    if ($stmt->num_rows > 0) {
                        $stmt->bind_result($id, $password);
                        $stmt->fetch();
                        // Account exists, now we verify the password.
                        // Note: remember to use password_hash in your registration file to store the hashed passwords.
                        if (password_verify($_POST['password'], $password)) {
                            // Verification success! User has logged-in!
                            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                            session_regenerate_id();
                            $_SESSION['loggedin'] = TRUE;
                            $_SESSION['name'] = $_POST['username'];
                            $_SESSION['id'] = $id;
                            echo 'Welcome ' . $_SESSION['name'] . '!';
                            header("location: adminshop.php?page=1");
                        } else {
                            // Incorrect password
                            echo 'Incorrect username and/or password!';
                        }
                    } else {
                        // Incorrect username
                        echo 'Incorrect username and/or password!';
                    }
                    $stmt->close();
                }
            }
            ?>
        </div>
        <div class="loginbutton">
            <input type="submit" value="Login" name="submit" form="loginform">
        </div>
    </div>
<div class="spacer" style="background-image: url('slike/Website Images/adminloginbottom.svg')"></div>
<footer class="footer">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</footer>
</body>
</html>