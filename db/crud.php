<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertDetails($fname,$lname,$dob,$email,$contact,$course1,$resaddress,$destination){
            try {
                $sql = "INSERT INTO userdetails (firstname,lastname,dateofbirth,username,contactnumber,course1,resaddress,avatar_path) VALUES (:fname,:lname,:dob,:email,:contact,:course1,:resaddress,:destination)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':course1',$course1);
                $stmt->bindparam(':resaddress',$resadress);
                $stmt->bindparam(':destination',$destination);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getCities(){
            try{
                $sql = "SELECT * FROM `cities`";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        // public function getCarousel(){
        //     try{
        //         $sql = "select *from museum order by discount DESC LIMIT 3;";
        //         $result = $this->db->query($sql);
        //         return $result;
        //     }catch (PDOException $e) {
        //         echo $e->getMessage();
        //         return false;
        //    }
           
        // }
 
    }
    
?>