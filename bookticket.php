<?php 
    $title = "Create Blog";
    require_once './includes/header.php';
    require_once './includes/auth_check.php';

    if(!isset($_GET['pid'])){
        include './includes/errormessage.php';
        
    } else{
        $id = test_input($_GET['pid']);
?>
  
    <h1 class="text-center">Book Tickets</h1>
    <form method="post" action="ticketConfirm.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="dov" class="form-label">Date of Visit</label>
            <input required type="text" class="form-control" id="dov" name="dov"></input>
        </div>
        <div class="mb-3">
            <label for="visitorcount" class="form-label">Number of Visitors</label>
            <input required type="text" class="form-control" id="visitorcount" name="visitorcount"></input>
        </div>
        <input required type="hidden" id="placeid" name="placeid" value="<?php echo $_GET[pid]; ?>"></input>
        <div class="py-3">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<?php
    }
  require './includes/footer.php';
?>