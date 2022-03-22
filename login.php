<?php
    $title = 'User Login'; 

    require_once './includes/header.php';
    require './includes/sanitise.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = test_input(strtolower(trim($_POST['email'])));
        $password = $_POST['password'];
        $password = $password.$username;
        $new_password = md5($password);

        $userresult = $user->getUser($username,$new_password);
        if(!$userresult){
            echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
        }else{
            $_SESSION['fname'] = $userresult['fname'];
            $_SESSION['userid'] = $userresult['userid'];
            $_SESSION['prefcity'] = $userresult['prefcity'];
            header("Location: index.php");
        }

    }
?>
<div class="row py-4">
        <h1 class="text-center bold">New User? <a href="./register.php">Register Here!</a></h1>
</div>
<div class="row">
  <div class="p-5 d-flex align-items-center justify-content-center">
      <div class="rounded-3 bg-light p-5 d-flex align-items-center justify-content-center">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data"  autocomplete=off>
        <div class="mb-3">
            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="d-grid gap-2 py-4">
        <input type="submit" value="Login" class="btn btn-orange-moon rounded-3">
        </div>
    </form>
</div>
</div>
</div>
<?php include_once './includes/footer.php'?>