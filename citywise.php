<?php 
    $title = "Ticketing System";
    require './includes/header.php';
    if (isset($_GET['cityid'])) {
       $cityresults = $crud->displayAreaWise($_GET['cityid']);
    }
    else {
        include "/includes/errormessage.php";
    }
?>
<?php
  include 'includes/footer.php'
?>