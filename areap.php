<?php session_start();
if (isset($_SESSION["email"])) {
    $usr = $_SESSION["email"];
} else
    header("Location: loginsystem.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="areap.js" defer></script>
    <link rel="stylesheet" href="arepstyle.css">
    <script src="https://kit.fontawesome.com/cb24559d14.js" crossorigin="anonymous" defer></script>
    <title>Area Personale</title>
</head>

<body>
    <div class="container">
        <div class="left-control">
            <div id="back">
                <a href="mhw1.php">
                    <i class="fas fa-long-arrow-alt-left"></i> Homepage
                </a>
            </div>
            <h1 style="display:none"><?php echo "$usr" ?></h1>
            <l>Nome: <div id="email" class="nome"></div>
            </l>
            <l>Email: <?php echo "$usr" ?>
            </l>
            <l>Numero: <div id="numero"></div>
            </l>


        </div>
        <div class="right-control">
            <div id="header">

                <l id="modify">Modifica dati</l>

                <l id="showReview">Recensioni</l>

                <l id="showReservation">Prenotazioni</l>
                <l id="logout">Logout</l>

            </div>
            <div class="generale">
                <div id="contenitore" class="hidden">
                    <form name="email" action="" id="email">
                        <input type="hidden" id="userid" value=<?php echo "$usr" ?>>
                        <input name="email" id="emailvalue" type="text" placeholder="modifica Email">
                        <input id="modem" type="submit" value="Invia" class="bottone">
                    </form>
                    <form action="" id="num">   
                    <input type="hidden" id="userid" value=<?php echo "$usr" ?>>
                        <input type="text" id="numval" placeholder="Modifica numero telefonico">
                        <input type="submit" id="modnum" value="Invia" class="bottone">
                    </form>
                    <form action="" id="pass">    
                    <div class="area"></div>
                    <input type="hidden" id="userid" value=<?php echo "$usr" ?>>
                    <div class="area"></div>
                    <input type="password" name="pass" placeholder="Password" id="field" class="re" required/>
                    <i class='fas fa-eye' id="vision"></i>
                    <div class="area"><d class="errors"> </d></div>
                    <input type="submit" id="modpass" value="Invia" class="bottone">
                    </form>
                </div>

                <div id="reviews" class="hidden">
                    <d>

                    </d>

                </div>

                <div id="reservations" class="hidden">
                    

                </div>


            </div>
     
        </div>
   </div>
</body>

</html>