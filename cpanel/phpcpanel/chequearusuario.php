<?php
  session_start();

  $useradmin= $_SESSION['admin'];
    if($useradmin == ''){
      echo "Tenes que iniciar sesión";
      header("refresh:3;index.php");
        exit();
    }
?>