<?php
require_once("server.php");

class TaskDatabase
{
    private $db;
    private $dbstate;
    private $errMsg;

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DBNAME, USERNAME, PASSWORD);
            $this->db->exec("set names utf8");
            $this->dbstate = 1;
            $this->errMsg = "Connection established";
        } catch (PDOException $e) {
            $this->errMsg = $e->getMessage();
            $this->dbstate = 0;
        }
    }

    public function getDbConnection()
    {
        return $this->db;
    }

    public function getState()
    {
        return $this->dbstate;
    }

    public function getErrorMsg()
    {
        return $this->errMsg;
    }

    public function __destruct()
    {
        $this->db = null;
    }

    public function addTask($name, $description, $userId)
    {
        $stmt = $this->db->prepare("INSERT INTO tasks (name, description, status, created_at, user_id) VALUES (?, ?, 'Pending', NOW(), ?)");
        $stmt->execute([$name, $description, $userId]);
    }

    public function updateTaskStatus($taskId, $status, $name, $description)
    {
        $stmt = $this->db->prepare("UPDATE tasks SET name = ?, description = ?, status = ? WHERE id = ?");
        $stmt->execute([$name, $description, $status, $taskId]);
    }
    

    public function deleteTask($taskId)
    {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->execute([$taskId]);
    }

    public function getAllTasks($userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function signupUser($username, $password)
    {
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $password]);
    }

    public function loginUser($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->execute([$username, $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function getUserTasks($userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
