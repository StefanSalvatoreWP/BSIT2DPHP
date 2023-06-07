<?php
    require_once("database.php");

    class config {
        private $id;
        private $firstname;
        private $lastname;
        private $age;
        private $address;
        private $gender;
        private $nationality;
        protected $con;

        public function __construct($id=0,$firstname="",$lastname="",$age=0,$address="",$gender="",$nationality="") {
            $this->id = $id;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->age = $age;
            $this->address = $address;
            $this->gender = $gender;
            $this->nationality = $nationality;

            $this->con = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER,DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }
        
        //getter
        public function getId() {
            return $this->id;
        }
        public function getFirstname() {
            return $this->firstname;
        }
        public function getLastname() {
            return $this->lastname;
        }
        public function getAge() {
            return $this->age;
        }
        public function getAddress() {
            return $this->address;
        }
        public function getGender() {
            return $this->gender;
        }
        public function getNationality() {
            return $this->nationality;
        }
        //setter
        public function setId($id) {
            $this->id = $id;
        }
        public function setFirstname($firstname) {
            $this->firstname = $firstname;
        }
        public function setLastname($lastname) {
            $this->lastname = $lastname;
        }
        public function setAge($age) {
            $this->age = $age;
        }
        public function setAddress($address) {
            $this->address = $address;
        }
        public function setGender($gender) {
            $this->gender = $gender;
        }
        public function setNationality($nationality) {
            $this->nationality = $nationality;
        }

        public function create() { //------> Create
            try {
                $stmt = $this->con->prepare("INSERT INTO `employee_list`(`firstname`, `lastname`, `age`, `address`, `gender`, `nationality`) VALUES (?,?,?,?,?,?)");
                $stmt->execute([$this->firstname, $this->lastname, $this->age, $this->address, $this->gender, $this->nationality]);
            } catch (PDOException $e) {
                echo 'Ceate Failed!<br>'.$e->getMessage();
            }
        }
        public function read() { //------> Read
            try {
                $stmt = $this->con->prepare("SELECT * FROM `employee_list`");
                $stmt->execute();
                return $stmt->fetchAll();   
            } catch(PDOException $e) {
                echo "No Data!<br>".$e->getMessage();
            }
        }
        public function update() { //------> Update
            try {
                $stmt = $this->con->prepare("UPDATE `employee_list` SET `firstname`=?,`lastname`=?,`age`=?,`address`=?,`gender`=?,`nationality`=? WHERE ?");
                $stmt->execute([$this->firstname, $this->lastname, $this->age, $this->address, $this->gender, $this->nationality, $this->id]);
            } catch(PDOException $e) {
                echo "Update Failed!<br>".$e->getMessage();
            }
        }
        public function delete() { //------> Delete
            try {
                $stmt = $this->con->prepare("DELETE FROM `employee_list` WHERE id = ?");
                $stmt->execute([$this->id]);
                return $stmt->fetchAll();
            } catch (PDOException $e) {
                echo "Delete Failed!<br>".$e->getMessage();
            }
        }
        public function fetchOne() {
            try {
                $stmt = $this->con->prepare("SELECT * FROM `employee_list` WHERE id=?");
                $stmt->execute([$this->id]);
                return $stmt->fetchAll();
            } catch (PDOException $e) {
                echo "Fetch One Failed!".$e->getMessage();
            }
        }
    }

?>