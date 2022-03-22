<?php 
    $title = "Ticketing System";
    require './includes/header.php';
    $carousel_get = $crud->getCarousel();
?>
<div class="row m-5">
  <div class="col col-lg-6">
	<div id="carouselExampleCaptions" class="carousel slide py-2" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
   
    <?php
    $is_first = "active";
    for ($i=0; $i < 3; $i++) { 
    $c = $carousel_get->fetch(PDO::FETCH_ASSOC);
    $car_src = $c['imagepath'];
    $car_alt = $c['placename'];
    $car_head = $c['placename'];
    $car_desc = $c['placeaddress'];
    $car_link = $c['placeid'];
    include "./includes/carousel.php";
    $is_first = "";
    }
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  </div>
</div>
  <div class="col col-lg-6 my-5">
    <h1 class="bold"><span style="color: rgba(227,48,2,1); font-size: 150%;">Book a ticket</span></h1>
    <div class="my-4 text-secondary">
			<span style="font-size: 120%">Book a ticket to your favorite heritage site or museum without having to experience the tiring queues</span>
		</div>
    <a class="bold btn btn-orange-moon rounded-3 mt-3 px-3 mb-5" href="./allPlaces.php" role="button">Book Now</a>
</div>
  </div>
</div>
<?php
  include 'includes/footer.php'
?>