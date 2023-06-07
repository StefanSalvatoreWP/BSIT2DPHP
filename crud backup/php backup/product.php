<?php
    require_once ('dbconfig.php');

    class Product{
        private $db_con;
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
                    $this->errMsg = $db->getErrorMessage();
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
        public function saveProduct($product){
            $sql = "INSERT INTO student(first_Name,last_Name,age) VALUES (:firstname,:lastname,:age)";
            try{
                $stmt = $this->db_con->prepare($sql);
                $stmt->bindParam(':firstname',$product['firstname']);
                $stmt->bindParam(':lastname',$product['lastname']);
                $stmt->bindParam(':age',$product['age']);
                // $stmt->bindParam(':manufacturer',$product['manufacturer']);
                $stmt->execute();
                return 1;
            }
            catch(PDOException $e){
                    return 0;
            }
        }

        public function getAllProducts(){
            $sql = "SELECT first_Name,last_Name,age FROM student order by first_Name";
                  $stmt = $this->db_con->prepare($sql);
                  $stmt->execute();

                  if($stmt->rowCount() > 0)
                  {
                        $rows = "";
                        while($rw = $stmt->fetch(PDO::FETCH_ASSOC))
                             {
                                $rows .= "<tr>";
                                $rows .= "<td>" . $rw['first_Name'] . "</td>";
                                $rows .= "<td>" . $rw['last_Name'] . "</td>";
                                $rows .= "<td>" . $rw['age'] . "</td>";
                                // $rows .= "<td>" . $rw['manufacturer'] . "</td>";
                                $btndel = "<a href='delete.php?prid=" . $rw['first_Name']. "' >Del </a>";
                                $btnupd = "<a href='#'>Update </a>";
                                $rows .= "<td>" .$btnupd . $btndel . "</td>";
                                $rows .= "</tr>";
                              
                             }
                               return $rows;
                    }
           

        }

            public function deleteProduct($prod){
                try{
                    $sql = "DELETE FROM student where first_Name = '$prod'";
                    $stmt = $this->db_con->prepare($sql);
                    $stmt->execute();
                    return 1;
                }
                catch (PDOException $e){
                    return 0;
                }
                
            }
    }
?>