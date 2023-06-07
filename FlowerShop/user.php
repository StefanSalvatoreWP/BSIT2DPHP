<?php
require_once('serverconfig.php');

class User {
    private $db_con;
    private $state;
    private $errMsg;

    public function __construct() {
        try {
            $dsn = 'mysql:host=' . SERVER_NAME . ';dbname=' . DBNAME;
            $this->db_con = new PDO($dsn, USERNAME, PASSWORD);
            $this->db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->state = 1;
        } catch (PDOException $e) {
            $this->state = 0;
            $this->errMsg = $e->getMessage();
        }
    }

    public function getState() {
        return $this->state;
    }

    public function getErrorMessage() {
        return $this->errMsg;
    }

    public function getDbConnection() {
        return $this->db_con;
    }

    public function signup($username, $password, $confirmPassword) {
        if ($password !== $confirmPassword) {
            $this->errMsg = "Passwords do not match.";
            return false;
        }

        try {
            $stmt = $this->db_con->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $password]);
            return true;
        } catch (PDOException $e) {
            $this->errMsg = $e->getMessage();
            return false;
        }
    }

    public function login($username, $password) {
        try {
            $stmt = $this->db_con->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && $user['password'] === $password) {
                return true;
            } else {
                $this->errMsg = "Invalid username or password.";
                return false;
            }
        } catch (PDOException $e) {
            $this->errMsg = $e->getMessage();
            return false;
        }
    }
}
?>
