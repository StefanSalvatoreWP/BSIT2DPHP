<link rel="stylesheet" href="main.css">

<?php
    require_once ('advanceddbConfig.php');

    class Student {
        private $db_con;
        private $state;
        private $errMsg;

        public function __construct() {
            try {
                $db = new Database();
                if($db->getState() == 1) {
                    $this->db_con = $db->getDbConnection();
                    $this->state = 1;
                } else {
                    $this->state = 0;
                    $this->errMsg = $db->getErrorMessage();
                }
            } catch(PDOException $e) {
                $this->state = 0;
                $this->errMsg = $e->getMessage();
            }
        }

        public function getState() {
            return $this->state;
        }

        public function getErrMsg() {
            return $this->errMsg;
        }

        public function saveStudent($myStudent) {
            $sql = "INSERT INTO advancedStudent(first_Name, last_Name, age , address , contact , nationality , gender , status , year) VALUES (:firstname, :lastname, :age, :address,:contact,:nationality,:gender,:status,:year)";
            try {
                $stmt = $this->db_con->prepare($sql);
                $stmt->bindParam(':firstname', $myStudent['firstname']);
                $stmt->bindParam(':lastname', $myStudent['lastname']);
                $stmt->bindParam(':age', $myStudent['age']);
                $stmt->bindParam(':address', $myStudent['address']);
                $stmt->bindParam(':contact', $myStudent['contact']);
                $stmt->bindParam(':nationality', $myStudent['nationality']);
                $stmt->bindParam(':gender', $myStudent['gender']);
                $stmt->bindParam(':status', $myStudent['status']);
                $stmt->bindParam(':year', $myStudent['year']);
                $stmt->execute();
                return 1;
            } catch(PDOException $e) {
                return 0;
            }
        }

        public function getAllStudents() {
            $sql = "SELECT student_id, first_Name, last_Name, age ,address , contact , nationality , gender , status, year FROM advancedStudent ORDER BY student_id";
            $stmt = $this->db_con->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $rows = "";
                while($rw = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $rows .= "<tr>";
                    $rows .= "<td class='studentidAdvanced'>" . $rw['student_id'] . "</td>";
                    $rows .= "<td>" . $rw['first_Name'] . "</td>";
                    $rows .= "<td>" . $rw['last_Name'] . "</td>";
                    $rows .= "<td>" . $rw['age'] . "</td>";
                    $rows .= "<td>" . $rw['address'] . "</td>";
                    $rows .= "<td>" . $rw['contact'] . "</td>";
                    $rows .= "<td>" . $rw['nationality'] . "</td>";
                    $rows .= "<td>" . $rw['gender'] . "</td>";
                    $rows .= "<td>" . $rw['status'] . "</td>";
                    $rows .= "<td>" . $rw['year'] . "</td>";
                    $btndel = "<div class='advancedstudentContainerDelete'><a class='advanceddeleteStudent' href='advancedDelete.php?student_id=" . $rw['student_id'] .  "' >Delete </a>";
                    $btnupd = "<div class='advancedstudentContainerUpdate'> <a class='advancedupdateStudent' href='advancedUpdate.php?student_id=" . $rw['student_id'] . "'>Update </a> </div>";
                    $rows .= "<td>" .$btnupd . $btndel . "</td>";
                    $rows .= "</tr>";
                }
                return $rows;
            }
        }

        public function deleteStudent($studentlist) {
            try {
                $sql = "DELETE FROM advancedStudent WHERE student_id = ?";
                $stmt = $this->db_con->prepare($sql);
                $stmt->bindParam(1, $studentlist);
                $stmt->execute();
                return 1;
            } catch (PDOException $e) {
                return 0;
            }
        }

        public function updateStudent($myStudent) {
            $sql = "UPDATE advancedStudent SET first_Name = :firstname, last_Name = :lastname, age = :age , address = :address , contact = :contact , nationality = :nationality , gender = :gender , status = :status , year = :year  WHERE student_id = :id";
            try {
                $stmt = $this->db_con->prepare($sql);
                $stmt->bindParam(':firstname', $myStudent['firstname']);
                $stmt->bindParam(':lastname', $myStudent['lastname']);
                $stmt->bindParam(':age', $myStudent['age']);
                $stmt->bindParam(':id', $myStudent['student_id']);
                $stmt->bindParam(':address', $myStudent['address']);
                $stmt->bindParam(':contact', $myStudent['contact']);
                $stmt->bindParam(':nationality', $myStudent['nationality']);
                $stmt->bindParam(':gender', $myStudent['gender']);
                $stmt->bindParam(':status', $myStudent['status']);
                $stmt->bindParam(':year', $myStudent['year']);
                $stmt->execute();
                return 1;
            } catch(PDOException $e) {
                return 0;
            }
        }
        

public function getStudentById($id) {
    $sql = "SELECT * FROM advancedStudent WHERE student_id = :id";
    try {
        $stmt = $this->db_con->prepare($sql);
        $stmt->bindParam(':id', $id);
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
