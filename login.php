<?php
    $title = 'User Login'; 

    require_once './includes/header.php';
    require './includes/sanitise.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = test_input(strtolower(trim($_POST['email'])));
        $password = test_input($_POST['password']);
        $new_password = md5($password.$username);

        $result = $user->getUser($username,$new_password);
        if(!$result){
            echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
        }else{
            $_SESSION['fname'] = $result['fname'];
            $_SESSION['userid'] = $result['userid'];
            header("Location: index.php");
        }

    }
?>
<?php include_once './includes/footer.php'?>