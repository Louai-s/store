<?php 
session_start();
session_destroy();//to get out the client from the website
header("Location:Sign_in.php");//back to backward page
 ?>