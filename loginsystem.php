<?php
//!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)
    session_start();
    if(isset($_SESSION["email"]))
    {
        header("Location: mhw1.php");
        exit;
    }
    if(isset($_POST["username"]) && isset($_POST["password"]))
    {
        $conn = mysqli_connect("localhost", "root", "", "gabs");
        
        $user = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]); 
        
        $query = "SELECT * FROM utente WHERE email = '$user' AND password = '$password'";
		
		$res = mysqli_query($conn, $query);
        $query3 = "SELECT * FROM utente WHERE email = '$user'";
		
		$res2 = mysqli_query($conn, $query3);
        $query4 = "SELECT * FROM utente WHERE email = '$user' AND password != '$password'";
		$res3 = mysqli_query($conn, $query4);
        if(mysqli_num_rows($res) > 0)
        {
            $_SESSION["email"] = $_POST["username"];
            header("location:javascript://history.go(-1)");
            exit;
        }
        if(mysqli_num_rows($res3)>0)
        {
            $errore3=true;
        }
        if(mysqli_num_rows($res2)==0)
        {
            $errore2 = true;
        }
    }
    if(isset($_POST["username"]) && isset($_POST["pass"])&& isset($_POST["email"])&& isset($_POST["telephone"]))
    {
        $conn = mysqli_connect("localhost", "root", "", "gabs");
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $pass = mysqli_real_escape_string($conn, $_POST["pass"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $telephone = mysqli_real_escape_string($conn, $_POST["telephone"]);
        $query = "SELECT * FROM utente WHERE username = \"$username\"";
		$res = mysqli_query($conn, $query);
        if(mysqli_num_rows($res)> 0)
        {
                        $errore = true;
        }
        else
        {
            if(preg_match('/^(?=.*[A-Za-z])[0-9A-Za-z]{8,}$/', $pass))
            {
             $query2 = "INSERT INTO utente VALUES(\"$username\", \"$pass\", \"$email\", \"$telephone\")";
            $res = mysqli_query($conn, $query2);
            $_SESSION["email"] = $_POST["email"];
            header("Location: mhw1.php");
            exit;
            }
            else{
                $err=true;
            }

        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Cache-control" content="no-cache">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="altlogjs.js" defer></script>
    <link rel="stylesheet" href="altlog.css">
    <script src="https://kit.fontawesome.com/cb24559d14.js" crossorigin="anonymous" defer></script>
    <title>Gab's</title>
</head>

<body>

    <button id="back"> <a href="mhw1.php"> torna all'homepage </a> </button>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form name="register" id="registra" method="post">
                <h1>Crea Account</h1>
                <div class="area">
                <?php
                if(isset($errore))
                {
                   echo"<p>Utente già esistente</p>" ;                } ?>
                </div>
                <div class="area"><e class="errorUser"> </e></div>
                <input type="text" name="username" placeholder="Nome" id="usr" required/>
                <input type="email" name="email"placeholder="Email" required/>
                <input type="tel" name="telephone" placeholder="Numero telefonico" required>
                <input type="password" name="pass" placeholder="Password" id="field" class="re" required/>
                <i class='fas fa-eye' id="vision"></i>
                <div class="area"><d class="errors"> </d></div>
                <input type="submit" value="REGISTRATI" id="pass" />
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form id="login" method="post">
                <h1>Accedi</h1>
                <div class="area">
                <?php
                if(isset($errore2) && isset($errore3))
                {
                    echo "<p> Utente e password inesistenti</p>";
                }
                   if(isset($errore2))
                   {
                       echo"<p>L'utente non esiste</p>";
                   }
                   if (isset($errore3))
                   {
                       echo"<p>La password e' errata</p>";
                   }
                   
                   ?>
                </div>
                <input type="text" name="username" placeholder="email" required/>
                <input type="password" name="password" placeholder="Password" id="field" required/>
                <i class='fas fa-eye' id="vision"></i>
                <input type="submit" value="ACCEDI" id="pass">
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>BEN TORNATO!</h1>
                    <p>Inserisci le tue credenziali per accedere</p>
                    <button class="ghost" id="signIn" id="pass2">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>BENVENUTO!</h1>
                    <p>Inserisci i tuoi dati personali per registrarti!</p>
                    <button class="ghost" id="signUp" id="pass2">Sign Up</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>