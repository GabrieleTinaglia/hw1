<?php

      // Connessione al database
      $conn = mysqli_connect("localhost", "root", "", "gabs");
      // Inizializza array di eventi
      $eventi = array();
      // Leggi eventi
      $res = mysqli_query($conn, "SELECT * FROM recensione ORDER BY data");
      while($row = mysqli_fetch_assoc($res))
      {
            $eventi[] = $row;
      }
      // Chiudi
      mysqli_free_result($res);
      mysqli_close($conn);
      // Ritorna
      echo json_encode($eventi);

?>