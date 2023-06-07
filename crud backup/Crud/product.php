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
            $sql = "INSERT INTO product(productname,price,category,manufacturer) VALUES (:productname,:price,:category,:manufacturer)";
            try{
                $stmt = $this->db_con->prepare($sql);
                $stmt->bindParam(':productname',$product['product_name']);
                $stmt->bindParam(':price',$product['price']);
                $stmt->bindParam(':category',$product['category']);
                $stmt->bindParam(':manufacturer',$product['manufacturer']);
                $stmt->execute();
                return 1;
            }
            catch(PDOException $e){
                    return 0;
            }
        }

        public function getAllProducts(){
            $sql = "SELECT product_id, productname,price,category,manufacturer FROM product order by product_id";
                  $stmt = $this->db_con->prepare($sql);
                  $stmt->execute();

                  if($stmt->rowCount() > 0)
                  {
                        $rows = "";
                        while($rw = $stmt->fetch(PDO::FETCH_ASSOC))
                             {
                                $rows .= "<tr>";
                                $rows .= "<td>" . $rw['product_id'] . "</td>";
                                $rows .= "<td>" . $rw['productname'] . "</td>";
                                $rows .= "<td>" . $rw['price'] . "</td>";
                                $rows .= "<td>" . $rw['category'] . "</td>";
                                $rows .= "<td>" . $rw['manufacturer'] . "</td>";
                                $btndel = "<a href='delete.php?product_id" . $rw['product_id']. "' >Del </a>";
                                $btnupd = "<a href='update.php?product_id" . $rw['product_id'] . "' >Update</a>";
                                $rows .= "<td>" .$btnupd . $btndel . "</td>";
                                $rows .= "</tr>";

                               
                             }
                               return $rows;
                    }
        }

            public function deleteProduct($prod){
                try{
                    $sql = "DELETE FROM product where product_id = ?";
                    $stmt = $this->db_con->prepare($sql);
                    $stmt->bindParam(1, $prod);
                    $stmt->execute();
                    return 1;
                }
                catch (PDOException $e){
                    return 0;
                }
                
            }
            
            public function updateProduct($myProduct) {
                $sql = "UPDATE product SET productname = :productname, price = :price, category = :category, manufacturer = :manufacturer 
                WHERE product_id = :id";
                try {
                    $stmt = $this->db_con->prepare($sql);
                    $stmt->bindParam(':productname', $myProduct['productname']);
                    $stmt->bindParam(':price', $myProduct['price']);
                    $stmt->bindParam(':category', $myProduct['category']);
                    $stmt->bindParam(':manufacturer', $myProduct['manufacturer']);
                    $stmt->bindParam(':id', $myStudent['product_id']);
                    $stmt->execute();
                    return 1;
                } catch(PDOException $e) {
                    return 0;
                }
            }

            public function getProductById($product_id) {
                $sql = "SELECT * FROM product WHERE product_id = :product_id";
                try {
                    $stmt = $this->db_con->prepare($sql);
                    $stmt->bindParam(':product_id', $product_id);
                    $stmt->execute();
                    if ($stmt->rowCount() == 1) {
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        return $row;
                    } else {
                        return false;
                    }
                } catch(PDOException $e) {
                    return false;
                }
            }
            
    }
?>