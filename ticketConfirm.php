<?php 
    $title = "Confirm Ticket";
    require_once './includes/header.php';
    require_once './includes/auth_check.php';

    if(isset($_POST['submit'])){
        $userresult = $crud->getUserByUserID($_SESSION['userid']);
        $dov = $_POST['dov'];
        $visitorcount = $_POST['visitorcount'];
        $placeid = $_POST['placeid'];
        $placeresult = $crud->getPlaceByID($placeid);
        $amount = $placeresult['ticketprice'] * $visitorcount;
        $dateofbooking = date('Y-m-d H:i:s');
?>
  
    <h1 class="text-center">Confirm Tickets</h1>
    <form method="post" action="ticketPay.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input required type="text" class="form-control" id="name" name="name" value="<?php echo $userresult['fname'] . ' ' . $userresult['lname'] ;?>" readonly="readonly"></input>
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">Contact Number</label>
            <input required type="text" class="form-control" id="number" name="number" value="<?php echo $userresult['contactnumber'] . ' ' . $userresult['contactnumber'] ;?>" readonly="readonly"></input>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-Mail</label>
            <input required type="text" class="form-control" id="email" name="email" value="<?php echo $userresult['emailaddress'];?>" readonly="readonly"></input>
        </div>
        <div class="mb-3">
            <label for="dov" class="form-label">Date of Visit</label>
            <input required type="text" class="form-control" id="dov" name="dov" value="<?php echo $dov?>" readonly="readonly"></input>
        </div>
        <div class="mb-3">
            <label for="visitorcount" class="form-label">Number of Visitors</label>
            <input required type="text" class="form-control" id="visitorcount" name="visitorcount" value="<?php echo $visitorcount?>" readonly="readonly"></input>
        </div>
        <div class="mb-3">
            <label for="pname" class="form-label">Place Name</label>
            <input required type="text" class="form-control" id="pname" name="pname" value="<?php echo $placeresult['placename']; ?>" disabled="disabled"></input>
        </div>
        <div class="mb-3">
            <label for="pcity" class="form-label">City</label>
            <input required type="text" class="form-control" id="pcity" name="pcity" value="<?php echo $placeresult['cityname']; ?>" disabled="disabled"></input>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input required type="text" class="form-control" id="amount" name="amount" value="<?php echo $amount; ?>" readonly="readonly"></input>
        </div>
        <input required type="hidden" id="placeid" name="placeid" value="<?php echo $placeid; ?>"></input>
        <input required type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['userid']; ?>"></input>
        <div class="py-3">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<?php
    }
  require './includes/footer.php';
?>