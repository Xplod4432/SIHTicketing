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

        public function getAllPlaces() {
            try{
                $sql = "SELECT * FROM `places`";
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
                while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $card_src = $r['imagepath'];
                    $card_title = $r['placename'];
                    $card_address = $r['placeaddress'];
                    $card_href = $r['placeid'];
                    $card_rating = $r['rating'];
                    $card_text = $r['description'];
                    include "./includes/scards.php";
                }
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

        public function getPlaceByID($placeid) {
            try {
                $sql = "SELECT * FROM places p INNER JOIN cities c ON p.cityid = c.cityid WHERE `placeid` = :placeid";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':placeid', $placeid);
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

        public function fetchTicket($tid,$uid) {
            try {
                $sql = "SELECT * FROM tickets t INNER JOIN user_details u ON t.userid = u.userid INNER JOIN places p ON t.placeid = p.placeid WHERE `ticketid` = :tid AND `userid` = :userid";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':tid', $tid);
                $stmt->bindparam(':userid', $uid);
                $stmt->execute();
                $result = $stmt->fetch();
                if ($stmt->rowCount() != 0) {
                    return $result;
                }
                else {
                    echo "Error: Ticket not found";
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getQrFromTID() {

        }

        public function viewTickets($uid) {
            try {
                $sql = "SELECT * FROM tickets t INNER JOIN places p ON t.placeid = p.placeid WHERE userid = :userid";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':userid', $uid);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
                if ($stmt->rowCount() != 0) {
                    return $result;
                }
                else {
                    echo "Seems empty here, start exploring and booking tickets!";
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        /* Sample to display the record one by one
        <table class="table">
        <tr>
            <th>Name</th>
            <th>City</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['placename'] ?></td>
                <td><?php echo $r['cityname'] ?></td>
                <td><?php echo $r['placetype'] ?></td>
                <td>
                <a href="viewTicket.php?id=<?php echo $r['ticketid'] ?>" class="btn btn-primary">View</a>
                <a href="editTicket.php?id=<?php echo $r['ticketid'] ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
        <?php }?>
        </table>
        */

        public function getCarousel() {
            try {
                $sql = "SELECT * FROM places p ORDER BY placeid DESC LIMIT 3;";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        // public function sendTicketMail() {
            
        // }
    }
?>