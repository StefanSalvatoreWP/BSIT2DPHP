<link rel="stylesheet" href="main.css">

<?php
    require_once ('dbconfig.php');

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
            $sql = "INSERT INTO student(first_Name, last_Name, age) VALUES (:firstname, :lastname, :age)";
            try {
                $stmt = $this->db_con->prepare($sql);
                $stmt->bindParam(':firstname', $myStudent['firstname']);
                $stmt->bindParam(':lastname', $myStudent['lastname']);
                $stmt->bindParam(':age', $myStudent['age']);
                $stmt->execute();
                return 1;
            } catch(PDOException $e) {
                return 0;
            }
        }

        public function getAllStudents() {
            $sql = "SELECT student_id, first_Name, last_Name, age FROM student ORDER BY student_id";
            $stmt = $this->db_con->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $rows = "";
                while($rw = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $rows .= "<tr>";
                    $rows .= "<td class='student-id'>" . $rw['student_id'] . "</td>";
                    $rows .= "<td>" . $rw['first_Name'] . "</td>";
                    $rows .= "<td>" . $rw['last_Name'] . "</td>";
                    $rows .= "<td>" . $rw['age'] . "</td>";
                    $btndel = "<div class='studentContainerDelete'><a class='deleteStudent' href='delete.php?student_id=" . $rw['student_id'] .  "' >Delete </a>";
                    $btnupd = "<div class='studentContainerUpdate'> <a class='updateStudent' href='update.php?student_id=" . $rw['student_id'] . "'>Update </a> </div>";
                    $rows .= "<td>" .$btnupd . $btndel . "</td>";
                    $rows .= "</tr>";
                }
                return $rows;
            }
        }

        public function deleteStudent($studentlist) {
            try {
                $sql = "DELETE FROM student WHERE student_id = ?";
                $stmt = $this->db_con->prepare($sql);
                $stmt->bindParam(1, $studentlist);
                $stmt->execute();
                return 1;
            } catch (PDOException $e) {
                return 0;
            }
        }

        public function updateStudent($myStudent) {
            $sql = "UPDATE student SET first_Name = :firstname, last_Name = :lastname, age = :age WHERE student_id = :id";
            try {
                $stmt = $this->db_con->prepare($sql);
                $stmt->bindParam(':firstname', $myStudent['firstname']);
                $stmt->bindParam(':lastname', $myStudent['lastname']);
                $stmt->bindParam(':age', $myStudent['age']);
                $stmt->bindParam(':id', $myStudent['student_id']);
                $stmt->execute();
                return 1;
            } catch(PDOException $e) {
                return 0;
            }
        }
        

public function getStudentById($id) {
    $sql = "SELECT * FROM student WHERE student_id = :id";
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
