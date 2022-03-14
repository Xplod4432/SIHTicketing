<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertPlaces($placename){
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

        public function insertCities($cityid,$stateid) {
            try {
                $sql = "INSERT INTO cities (cityname,stateid) VALUES (:cityname,:stateid)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':placename',$placename);
                $stmt->bindparam(':stateid',$stateid);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getallPlaces(){
            try{
                $sql = "SELECT * FROM places a INNER JOIN cities c ON a.cityid = c.cityid INNER JOIN states s ON c.statedid = s.stateid ORDER BY placeid DESC";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
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
                <a href="viewPlace.php?id=<?php echo $r['placeid'] ?>" class="btn btn-primary">View</a>
                <a href="editPlace.php?id=<?php echo $r['placeid'] ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Are you sure you want to disable bookings for this place?')" href="disablePlace.php?id=<?php echo $r['placeid'] ?>" class="btn btn-danger">Disable</a>
                </td>
            </tr>
        <?php }?>
        </table>
        */

        public function getAllTickets() {
            try {
                $sql = "SELECT * FROM tickets t INNER JOIN places p ON t.placeidid = p.placeid INNER JOIN user_details u ON t.userid = u.userid ORDER BY dateofbooking DESC";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>