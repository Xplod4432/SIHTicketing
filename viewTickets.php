<?php 
    $title = "View Ticket";
    require './includes/header.php';
    require './includes/auth_check.php';
    $ticketresults = $crud->viewTickets($_SESSION['userid']);
    include 'includes/footer.php'
?>