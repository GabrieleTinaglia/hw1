<?php
        if(isset($_GET['nome']))
        {
         $conn = mysqli_connect("localhost", "root", "", "gabs");
         $user = mysqli_real_escape_string($conn, $_GET['nome']);
      $eventi = array();

      $res = mysqli_query($conn, "SELECT * from reserve where utente='$user'");
      while($row = mysqli_fetch_assoc($res))
      {
            $eventi[] = $row;
      }
      mysqli_free_result($res);
      mysqli_close($conn);
      echo json_encode($eventi); 
        }

    ?>