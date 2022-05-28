<htlm>
<?php session_start();
            if(isset($_SESSION["email"]))
            {
                $conn = mysqli_connect("localhost", "root", "", "gabs");
                $usr= $_SESSION["email"];
                $query="SELECT username from utente where email='".$usr."'";
                 $result=mysqli_query($conn,$query);
                 $user=mysqli_fetch_array($result);

        
            }
            else
                header("Location: loginsystem.php");
                
            ?>
    <head>
        <title>Gab's Restaurant</title>
        <link rel="stylesheet" type="text/css" href="prenota.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/cb24559d14.js" crossorigin="anonymous" defer></script>
        <script src="jsprenota.js" defer="true">
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <nav>


            <a href="contatti.php"> Contatti</a>
            <a href="menu.php"> Menù</a>
            <a href="areap.php">Area Personale</a>
            <a href="mhw1.php"> Home</a>
            <a href="crew.php"> Crew</a>


        </nav>
        <div class="container">
            <div id="overlay"> </div>
            <article>

                <form id="form">
                    <input type="hidden" name="from_name" value=<?php echo"$usr"?>>
                    <input type="date" name="data" min="<?php echo date("Y-m-d"); ?>" id="datamin" required>
                    <div class="Form-cont">Orario</div>
                    <select name="orari" id="ora">                   
                    <option id="13:00">13:00</option>
                    <option id="14:00">14:00</option>
                    <option id="15:00">15:00</option>
                    <option id="19:00">19:00</option>
                    <option id="20:00">20:00</option>
                    <option id="21:00">21:00</option>
                    <option id="22:00">22:00</option>
                    <option id="23:00">23:00</option>
                    </select>
                    <div class="Form-cont">Numero Persone</div>
                    <input type="number" name="numero" min="1" max="8" value="1">
                    <div class="Form-cont">Note:</div>
                    <textarea name="message" style="resize:none"></textarea>
                    <br>
                    <button type="submit">Invia</button>

                    <div id="result"></div>

                </form>

            </article>
        </div>

        <footer>

            <div id="footer-el">
                <i class="far fa-clock"></i> <j>Orari <br> Lun-Ven 12-15/20-24 <br> Sab-Dom 19-01</j>
            </div>
            <div id="footer-el">
                <i class="far fa-map"></i> <j>Via Re Leonida 33, Roma <br> Alfonso Gabriele Tinaglia
                <br> 100006087 </j>
            </div>
            <div id="footer-el">
                <i class="far fa-id-card"></i> <j>+39 3338889291 <br> Crew@Gabs.it <br></j>

            </div>
            
            
        </footer>
    </body>
</htlm>