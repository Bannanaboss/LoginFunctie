<?php
    session_start();

    $users = array(
        "piet@worldonline.nl" => array("pwd" => "doetje123"),
        "klaas@carpets.nl" => array("pwd" => "snoepje777"),
        "truushendriks@wegweg.nl" => array("pwd" => "arkiearkie201")
    );

    function checkLoggedIn($loggedIn) {
            if (!isset($users[$_POST["login"]])
                && $users[$_POST["login"]]["pwd"] == $_POST["pwd"])
            {
                $loggedIn = false;
            }
        return $loggedIn;
    }

    if (isset($_POST["knop"])) {
        if (checkLoggedIn(true)) {
            $_SESSION["user"] = array("naam" => $_POST["login"],
                "pwd" => $users[$_POST["login"]]["pwd"]);
            $message = "Welkom";
        } else {
            $message = "Sorry, geen toegang!";

        }
    } else {
        $message = "Inloggen";
    }
?>

<html>
<body>
<h1><?php echo $message; ?></h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
        <label for="login">Login:</label>
        <input type="text" name="login" value="">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" name="pwd" value="">
    </div>
    <input type="submit" name="knop">
</form>
</body>
</html>