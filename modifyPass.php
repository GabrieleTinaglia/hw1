<?php 
if(isset($_GET['nome']) && isset($_GET['pass']))
{
    
  // Connessione al database
  $conn = mysqli_connect("localhost", "root", "", "gabs");
                $user = mysqli_real_escape_string($conn, $_GET['nome']);

                $pass=mysqli_real_escape_string($conn,$_GET['pass']);
mysqli_query($conn, "UPDATE utente SET password='$pass' where email='$user'");
  mysqli_close($conn);
}

?>