<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertPlaceDetails($placename){
            try {
                $sql = "INSERT INTO places (placename) VALUES (:placename)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':placename',$placename);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getCities(){
            try{
                $sql = "SELECT * FROM `cities` ORDER BY `cityid` ASC LIMIT 5";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getAllCities() {
            try{
                $sql = "SELECT * FROM `cities` ORDER BY `cityname` ASC";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function displayAreaWise($cityid) {
            try{
                $sql = "SELECT * FROM places WHERE cityid = :cityid";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':cityid', $cityid);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function searcPlaces($keyword) {
            try {
                $sql = "SELECT * FROM places p INNER JOIN cities c ON p.cityid = c.cityid WHERE `placename` LIKE :keyword OR `cityname` LIKE :citykeyword";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':keyword', $keyword);
                $stmt->bindparam(':citykeyword', $keyword);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function buyTicket() {

        }

        public function printTicket() {

        }

        public function viewTicket() {

        }

        public function sendTicketMail() {
            
        }
    }
?>