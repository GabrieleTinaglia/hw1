<?php

      // Verifica dati POST
      if(isset($_POST["from_name"]) && isset($_POST["data"]) && isset($_POST['orari']) && isset($_POST['numero']) && isset($_POST['message']))
      {
            // Connessione al database
            $conn = mysqli_connect("localhost", "root", "", "gabs");
            $email = mysqli_real_escape_string($conn, $_POST["from_name"]);
            $res=mysqli_query($conn, "SELECT username from utente where email='".$email."'");
            $nome=mysqli_fetch_array($res);

            $data = mysqli_real_escape_string($conn, $_POST["data"]);
            $orario = mysqli_real_escape_string($conn, $_POST["orari"]);
            $npersone = mysqli_real_escape_string($conn, $_POST["numero"]);
            $messaggio = mysqli_real_escape_string($conn, $_POST["message"]);
            mysqli_query($conn, "INSERT INTO reserve(data,n_persone,note,utente,ora) VALUES(\"$data\", \"$npersone\", \"$messaggio\",\"$nome[0]\", \"$orario\")");
            // Chiudi connessione
            mysqli_close($conn);
      }

?>