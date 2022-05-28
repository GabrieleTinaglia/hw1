<?php

      // Verifica dati POST
      if(isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST['phone']) && isset($_POST['message']))
      {
            // Connessione al database
            $date = date('d-m-y h:i:s');
            $conn = mysqli_connect("localhost", "root", "", "gabs");
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $nome = mysqli_real_escape_string($conn, $_POST["name"]);
            $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
            $messaggio = mysqli_real_escape_string($conn, $_POST["message"]);
            mysqli_query($conn, "INSERT INTO form (nome,dataora,email,telefono,note) VALUES(\"$nome\", \"$date\",\"$email\", \"$phone\", \"$messaggio\")");
            // Chiudi connessione
            mysqli_close($conn);
      }

?>