<div class="row my-3 m-lg-5 p-lg-5 row-cols-1 row-cols-lg-2 g-4 bg-light">
    <div class="col-12 col-md-4">
            <img class="img-fluid lozad" style="width: 100%;" src="<?php echo $card_src; ?>" alt="<?php echo $card_title; ?>">
    </div>
<div class="col-12 col-md-8 sr-links">
<a href="./place.php?pid=<?php echo $card_href; ?>">
        <h1 class="bold my-3 mx-3"><?php echo $card_title; ?></h1>
        <span class="text-black-50 mt-3 ms-3"><?php echo $card_address; ?></span>
        <div class="ps-2 pt-3 pb-3">
        <span class="p-2"><i class="bi bi-star-fill" style="font-size:1.1rem;"></i><span class="text-black-50 px-2"><?php echo $card_rating; ?></span></span>
        </div>
        <div class="row ps-3" style="overflow: hidden;">
            <p class="card-text"><?php echo substr($card_text, 0, 150) . "...."; ?></p>
        </div>
</a>
</div>
</div>