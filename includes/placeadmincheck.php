<?php
    if(!($_SESSION['accesslevel'] == 2)){
        header("Location: pladminlogin.php");
    }
?>