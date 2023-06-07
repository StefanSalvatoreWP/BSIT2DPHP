
<?php
    require_once ('config.php');

    class contacts{
        public $db_con;
        private $state;
        private $errMsg;

        public function __construct(){
            try{
                $db = new Database();
                if($db->getState() == 1){
                    $this->db_con = $db->getDbConnection();
                    $this->state = 1;
                }else{
                    $this->state = 0;
                    $this->errMsg = $db->getErrorMsg();
                }
            }
            catch(PDOException $e){
               $this->state = 0;
               $this->errMsg = $e->getMessage();
            }
        }
        public function getState(){
            return $this->state;
        }
        public function getErrMsg(){
            return $this->errMsg;
        }
       public function savecontacts($Contact_Name, $Tel_Number, $Address, $Relation){
    $sql = "INSERT INTO contacts(Contact_Name, Tel_Number, Address, Relation) VALUES (:Contact_Name, :Tel_Number, :Address, :Relation)";
    try {
        $stmt = $this->db_con->prepare($sql);
        $stmt->bindParam(':Contact_Name', $Contact_Name);
        $stmt->bindParam(':Tel_Number', $Tel_Number);
        $stmt->bindParam(':Address', $Address);
        $stmt->bindParam(':Relation', $Relation);
        $stmt->execute();
        return 1;
    } catch(PDOException $e) {
        return 0;
    }
}


        public function getAllcontacts(){
            $sql = "SELECT Contact_Name,Tel_Number,Address,Relation FROM contacts order by Contact_Name";
                  $stmt = $this->db_con->prepare($sql);
                  $stmt->execute();

                  if($stmt->rowCount() > 0)
                  {
                        $rows = "";
                        while($rw = $stmt->fetch(PDO::FETCH_ASSOC))
                             {
                                $rows .= "<tr>";
                                $rows .= "<td>" . $rw['Contact_Name'] . "</td>";
                                $rows .= "<td>" . $rw['Tel_Number'] . "</td>";
                                $rows .= "<td>" . $rw['Address'] . "</td>";
                               
                                $rows .= "<td>". $rw['Relation']."</td>";
                                $btndel = "<a href='delete.php?user=" . $rw['Contact_Name']. "' >Remove </a>";
                                $btnupd = "<a href='update.php?user=".$rw['Contact_Name']."'>Update </a>" ;
                                $rows .= "<td>" .$btnupd . $btndel . "</td>";
                                $rows .= "</tr>";
                              
                             }
                               return $rows;
                    }
                  
        }

            public function deletecontacts($user){
                try{
                    $sql = "DELETE FROM contacts where Contact_Name = '$user'";
                    $stmt = $this->db_con->prepare($sql);
                    $stmt->execute();
                    return 1;
                }
                catch (PDOException $e){
                    return 0;
                }
                
            }
            public function updatecontacts($user)
            {
                try {
                    $sql = "UPDATE contacts SET Tel_Number=:Tel_Number, Address=:Address, Relation=:Relation WHERE Contact_Name=:Contact_Name";
                    $stmt = $this->db_con->prepare($sql);
                    $stmt->bindParam(':Contact_Name', $user['Contact_Name'], PDO::PARAM_STR); // Add PDO::PARAM_STR
                    $stmt->bindParam(':Tel_Number', $user['Tel_Number']);
                    $stmt->bindParam(':Address', $user['Address']);
                    $stmt->bindParam(':Relation', $user['Relation']);
                    $stmt->execute();
                    return 1;
                } catch (PDOException $e) {
                    return 0;
                }
            }    
            } 
          
          
        
?>
