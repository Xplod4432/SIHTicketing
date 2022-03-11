<?php
    $title = "Sign Up";
    require_once './db/conn.php';
    require_once './includes/header.php';

    $results = $crud->getCities();
?>
    <h1 class="text-center">Register for Classes</h1>
    <form method="post" action="success.php" enctype="multipart/form-data" autocomplete="off">
        <div class="mb-3">
            <label for="fname" class="form-label">First Name</label>
            <input required type="text" class="form-control" id="fname" name="blogtitle">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input required type="text" class="form-control" id="lname" name="lname">
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">E-Mail</label>
            <input required type="mail" class="form-control" id="mail" name="mail">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input required type="tel" class="form-control" id="phone" name="phone">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input required type="text" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="course" class="form-label">Select Courses</label>
            <select id="course" name="course" class="form-select">
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                   <option value="<?php echo $r['cityid'] ?>"><?php echo $r['cityname']; ?></option>
                <?php }?>
            </select>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input required type="text" class="form-control" id="address" name="address"></input>
        </div>
        <div class="py-3">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<?php
  require './includes/footer.php'
?>