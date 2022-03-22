<?php 
    $title = "Ticketing System";
    require './includes/header.php';
    $placeresult = $crud->getAllPlaces();
    while ($r = $placeresult->fetch(PDO::FETCH_ASSOC)) {
        $card_src = $r['imagepath'];
        $card_title = $r['placename'];
        $card_address = $r['placeaddress'];
        $card_href = $r['placeid'];
        $card_rating = $r['rating'];
        $card_text = $r['description'];
        include "./includes/scards.php";
    }
  include 'includes/footer.php'
?>