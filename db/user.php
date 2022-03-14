<?php 

    class user{
        private $db;
        function __construct($conn){
            $this->db = $conn;
        }

        public function insertUser($email,$password,$fname,$lname,$contact,$dob,$cityid,$token){
            try {
                if (!validateToken($token,$email)) {    //assigned to Narahari
                    echo "Verification failed, please try again";
                    return false;
                }
                else{
                    $sql = "INSERT INTO user_details (emailaddress,password,fname,lname,contactnumber,dateofbirth,prefcity) VALUES (:email,:password,:fname,:lname,:contact,:dob,:cityid)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':email',$email);
                    $stmt->bindparam(':fname',$fname);
                    $stmt->bindparam(':lname',$lname);
                    $stmt->bindparam(':password',$password);
                    $stmt->bindparam(':contact',$contact);
                    $stmt->bindparam(':dob',$dob);
                    $stmt->bindparam(':cityid',$cityid);
                    $stmt->execute();
                    return true;
                }
                
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUser($username,$hashed_password){
            try{
                $sql = "select * from userdetails where username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $hashed_password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
           }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function updateUserDetails($fname,$lname,$phone,$dob,$prefcity,$userid) {
            try {
                $sql = "UPDATE `user_details` SET `fname`=:fname,`lname`=:lname,`contactnumber`=:phone,`dateofbirth`=:dob,`prefcity`=:prefcity WHERE `userid`=:userid";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':prefcity',$prefcity);
                $stmt->bindparam(':userid',$userid);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function registerProcessUser($email,$password) {
            try {
                $result = $this->getUserCountByEmail($email);
                    if($result['num'] > 0){
                        echo "E-Mail already Registered";
                        return false;
                    }
                    else{
                        $new_password = md5($password.$email);
                        //$token = generateToken();
                        //assigned to Narahari
                        $sql = "INSERT INTO reg_process_users (emailid,password,token) VALUES (:email,:password,:token)";
                        $stmt->bindparam(':email',$email);
                        $stmt->bindparam(':password',$password);
                        $stmt->bindparam(':token',$token);
                        $stmt->execute();
                        echo "Check email for the verfication link/OTP";
                        return true;
                    }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUserCountByEmail($email){
            try{
                $sql = "select count(*) as num from user_details where emailaddress = :email";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email',$email);
                $stmt->execute();
                $result1 = $stmt->fetch();
                $sql = "select count(*) as num from reg_process_users where emailid = :email";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email',$email);
                $stmt->execute();
                $result2 = $stmt->fetch();
                $result = $result1 + $result2;
                return $result;
            }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
            }
        }

        public function getUserByEmail($email){
            try {
                $sql = "select * from reg_process_users where emailid = :email";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email', $email);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        // public function getUserDetails($userid){
        //     try {
        //         $sql = "select * from user_details where id = :userid";
        //         $stmt = $this->db->prepare($sql);
        //         $stmt->bindparam(':userid', $userid);
        //         $stmt->execute();
        //         $result = $stmt->fetch();
        //         return $result;
        //     } catch (PDOException $e) {
        //         echo $e->getMessage();
        //         return false;
        //     }
        // }
        
        public function getUsers(){
            try{
                $sql = "SELECT * FROM user_details";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function changePwd($email,$oldpassword,$newpassword){
            try {
                $salted_password = md5($oldpassword.$username);
                $new_password = md5($newpassword.$username);
                $sql = "UPDATE users SET password=:newpassword WHERE email = :email AND password = :oldpassword";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':oldpassword', $salted_password);
                $stmt->bindparam(':newpassword', $new_password);
                $stmt->execute();
                $result = $stmt->rowCount();
                if ($result == 0) {
                    echo "Password Incorrect";
                    return false;
                }
                else{
                    include './includes/successmessage.php';
                return true;}
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>