<?php
    $title = 'View Place'; 

    require_once 'includes/header.php';
    require './includes/sanitise.php';
    if(!isset($_GET['pid'])){
        include './includes/errormessage.php';
        
    } else{
        $placeid = test_input($_GET['pid']);
        $placeresult = $crud->getPlaceByID($placeid);
?>
<div class="row py-5">
        <h1 class="text-center bold">Book Ticket</h1>
</div>
<div class="row pb-5 row-cols-1 row-cols-lg-2 g-4">
    <div class="col-12 col-md-8">
            <img class="img-fluid lozad" style="width: 100vw;" src="<?php echo $placeresult['imagepath']; ?>" alt="<?php echo $placeresult['placename']; ?>">
    </div>
<div class="col-12 col-md-8 sr-links">
        <h1 class="bold mt-3 ms-3 mb-3"><?php echo $placeresult['placename']; ?></h1>
        <span class="text-black-50 mt-3 ms-3"><?php echo $placeresult['placeaddress']; ?></span>
        <div class="ps-2 pt-3 pb-5">
        <span class="p-2"><i class="bi bi-star-fill" style="font-size:1.3rem;"></i><span class="text-black-50 px-2">
            <?php 
                echo $placeresult['rating'];
            ?></span></span>
    </div>
    <div class="row pb-5">
                <div class="col"><p><a href="./bookticket.php?pid=<?php echo $placeresult['placeid']; ?>" class="btn btn-orange-moon rounded-pill">Book Here</a></p></div>
    </div>
    </div>
    </div>
    <hr/>
<div class="row pb-5">
        <div class="col"><p><?php echo $placeresult['description']; ?></p></div>
</div>
<hr/>
<?php }?>
<?php require_once 'includes/footer.php'; ?>