<?php 
session_start();
if(isset($_GET['nome']) && isset($_GET['email']))
{
    
  // Connessione al database
  $conn = mysqli_connect("localhost", "root", "", "gabs");
                $user = mysqli_real_escape_string($conn, $_GET['nome']);
  $res=mysqli_query($conn, "SELECT username from utente where email='".$user."'");
  $user=mysqli_fetch_array($res);

                $email=mysqli_real_escape_string($conn,$_GET['email']);
mysqli_query($conn, "UPDATE utente SET email='$email' where username='$user[0]'");
 $_SESSION['email']=$email;
  mysqli_free_result($res);
  mysqli_close($conn);
}

?>