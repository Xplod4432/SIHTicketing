<?php 
  include_once 'includes/session.php';
  require './db/conn.php';
  $results = $crud->getCities();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="<?php echo $extracss; ?>" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$( function() {
			$( "#dob" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "-100:+0",
			dateFormat: "yy-mm-dd"
			});
		} );
    $( function() {
			$( "#dov" ).datepicker({
			yearRange: "-0:+1",
			dateFormat: "yy-mm-dd"
			});
		} );
	</script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link href="./css/local.css" rel="stylesheet">
  <link rel="shortcut icon" href="./includes/logo.ico" type="image/x-icon"/>

  <style>
body {
  font-family: 'Poppins';
}
</style>
<title><?php echo $title; ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top border-bottom border-2">
  <div class="container-fluid">
  <a class="navbar-brand align-baseline" href="./index.php">
        <img src="./images/logo.png" alt="" height="38" class="d-inline-block align-text-top"/>
				<span style="color: rgba(227,48,2,1); vertical-align: middle; font-size: 1rem; position: relative;
  bottom: -3px; margin-left: 7px;" class="bold">Digital Vikings</span>
			</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link bold mx-5" aria-current="page" href="./index.php">Home</a>
        </li>
        <li class="nav-item dropdown bold mx-5">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span>
              Browse Cities
            </span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
              <li><a class="dropdown-item" href="./citywise.php?cityid=<?php echo $r['cityid'] ?>"><?php echo $r['cityname']; ?></a></li>
              <li><hr class="dropdown-divider"></li>
            <?php } ?>
          </ul>
        </li>
        <li class="nav-item mx-5 mb-1">
        <div class="input-group">
        <form class="d-flex" action="./search.php" method="get">
          <input class="form-control me-2 rounded-pill" id="Search" name="Search" type="search" placeholder="Search" aria-label="Search" required>
            <button class="btn btn-default" type="submit">
                <span class="fa fa-search"></span>
            </button>
        </div>
          </form>
      </li>
      </ul>
      <?php if (!isset($_SESSION['userid'])) {?>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
          <a class="bold btn btn-orange-moon rounded-3 ms-5" href="./login.php">Login</a>
        </li>
      </ul>
      <?php } ?>
      <?php if (isset($_SESSION['userid'])){?>
      <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle bold ms-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span>
              Hello <?php echo $_SESSION['fname'] ?>
            </span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="./citywise.php?cityid=<?php echo $_SESSION["prefcity"]; ?>">Book Tickets</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./viewTickets.php">View Bookings</a></li>
            <li><hr class="dropdown-divider"></li>
            <!-- <li><a class="dropdown-item" href="./eventview.php">Event Feedbacks</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./changepwd.php">Change Password</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./queryview.php">View Queries</a></li> -->
          </ul>
        </li>
        <li class="nav-item">
          <a class="bold btn btn-orange-moon rounded-3 ms-5" href="./logout.php">Logout</a>
        </li>
        <?php }?></div>
    </div>
  </div>
</nav>
<div class="container">