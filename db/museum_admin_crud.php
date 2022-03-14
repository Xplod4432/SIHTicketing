<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function editPlaceDetails($palceid,$cityid,$ticketprice,$placeaddress,$placetypid,$imagepath,$descr) {
            try{
                $sql = "UPDATE places p INNER JOIN placeadmin pa ON p.placeid = pa.placeid SET `cityid`=:cityid,`ticketprice`=:ticketprice,`placeaddress`=:placeaddress,`placetypeid`=:placetypeid,`imagepath`=:imagepath,`description`=:descr WHERE `placeid`=:placeid";
                $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':placeid',$placeid);
                 $stmt->bindparam(':cityid',$cityid);
                 $stmt->bindparam(':ticketprice',$ticketprice);
                 $stmt->bindparam(':placeaddress',$placeaddress);
                 $stmt->bindparam(':placetypid',$placetypid);
                 $stmt->bindparam(':imagepath',$imagepath);
                 $stmt->bindparam(':descr',$descr);
                 $stmt->execute();
                 return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
               }
        }
        }
?>