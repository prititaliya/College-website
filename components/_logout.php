<?php
// session_start();
ob_start();
if( session_status() == 1 )
   session_start();
//echo $_SESSION['username'];
unset($_SESSION["username"]);
unset($_SESSION["role"]);
session_destroy();
session_write_close();
try{
   if(!headers_sent())
   header('Location:../index.php');
}catch(Exception $e){

}

ob_end_flush();