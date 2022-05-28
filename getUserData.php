<?php

/*if(isset($_GET['username']) && isset($_GET['username2']))
{
    
  // Connessione al database
  $conn = mysqli_connect("localhost", "root", "", "gabs");
  // Inizializza array di eventi
  $eventi = array();
  // Leggi eventi
  $us=$_GET['username'];
      $user = mysqli_real_escape_string($conn, $_GET['username']);
      $user2=mysqli_real_escape_string($conn,$_GET['username2']);
      $user3= $user .' '. $user2;
  $res = mysqli_query($conn, "SELECT username,email, telefono FROM utente where username='".$user3."'");
  while($row = mysqli_fetch_assoc($res))
  {
        $eventi[] = $row;
  }
  // Chiudi
  mysqli_free_result($res);
  mysqli_close($conn);
  // Ritorna
  echo json_encode($eventi);
}
else */if(isset($_GET['email']))
    {
        
      // Connessione al database
      $conn = mysqli_connect("localhost", "root", "", "gabs");
      // Inizializza array di eventi
      $eventi = array();
      // Leggi eventi
					$user = mysqli_real_escape_string($conn, $_GET['email']);
      $res = mysqli_query($conn, "SELECT username, telefono from utente WHERE email='$user'");
      while($row = mysqli_fetch_assoc($res))
      {
            $eventi[] = $row;
      }
      // Chiudi
      mysqli_free_result($res);
      mysqli_close($conn);
      // Ritorna
      echo json_encode($eventi);
    }

?>