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
            $sql = "INSERT INTO student(fname,lname,email) VALUES (:fname,:lname,:email)";
            try{
                $stmt = $this->db_con->prepare($sql);
                $stmt->bindParam(':fname',$product['fname']);
                $stmt->bindParam(':lname',$product['lname']);
                $stmt->bindParam(':email',$product['email']);
                $stmt->execute();
                return 1;
            }
            catch(PDOException $e){
                    return 0;
            }
        }

        public function getAllProducts(){
            $sql = "SELECT id,fname,lname,email FROM student order by fname";
                  $stmt = $this->db_con->prepare($sql);
                  $stmt->execute();

                  if($stmt->rowCount() > 0)
                  {
                        $rows = "";
                        while($rw = $stmt->fetch(PDO::FETCH_ASSOC))
                             {
                                $rows .= "<tr>";
                                $rows .= "<td>" . $rw['id'] . "</td>";
                                $rows .= "<td>" . $rw['fname'] . "</td>";
                                $rows .= "<td>" . $rw['lname'] . "</td>";
                                $rows .= "<td>" . $rw['email'] . "</td>";
                                $btndel = "<a class='btn btn-danger' href='delete.php?prid=". $rw['fname']. "' >DELETE </a>";
                                $btnupd = "<a class='btn  btn-success' href='update.php?prid=" .$rw['fname']. "' >UPDATE </a>";
                                $rows .= "<td>" .$btnupd . $btndel . "</td>";
                                $rows .= "</tr>";
                              
                             }
                               return $rows;
                    }
           

        }

            public function deleteProduct($prod){
                try{
                    $sql = "DELETE FROM student where fname = '$prod'";
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