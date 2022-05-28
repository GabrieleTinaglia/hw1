<?php 
if(isset($_GET['nome']) && isset($_GET['num']))
{
    
  // Connessione al database
  $conn = mysqli_connect("localhost", "root", "", "gabs");
                $user = mysqli_real_escape_string($conn, $_GET['nome']);

                $num=mysqli_real_escape_string($conn,$_GET['num']);
mysqli_query($conn, "UPDATE utente SET telefono='$num' where email='$user'");
  mysqli_close($conn);
}

?>