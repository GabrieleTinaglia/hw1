<?php 
 $conn = mysqli_connect("localhost", "root", "", "gabs");
 $eventi = array();
  $res = mysqli_query($conn, "SELECT username from utente ");
 while($row = mysqli_fetch_assoc($res))
 {
       $eventi[] = $row;
 }
 mysqli_free_result($res);
 mysqli_close($conn);
 
 echo json_encode($eventi);
?>