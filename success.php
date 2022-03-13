<?php
    $title = 'Success'; 
    require_once 'includes/header.php';
    require './includes/sanitise.php';

    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $fname = test_input($_POST['fname']);
        $lname = test_input($_POST['lname']);
        $dob = test_input($_POST['dob']);
        $email = test_input($_POST['mail']);
        $contact = test_input($_POST['phone']);
        $tokenauth = test_input($_POST['course']);
        $cityid = test_input($_POST['prefcity']);
        $password = test_input($_POST['password']);

        //Call function to insert and track if success or not
        $isSuccess = $user->insertUser($username,$password,$fname,$lname,$contact,$dob,$cityid);
        if($isSuccess){
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }
    }
?>
<?php require_once 'includes/footer.php'; ?>