<?php
    if(!($_SESSION['accesslevel'] == 3)){
        header("Location: index.php");
    }
?>