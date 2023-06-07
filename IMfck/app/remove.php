<?php

if (isset($_POST['id'])) {
    require '../db_conn.php';

    $id = $_POST['id'];

    if (empty($id)) {
        echo "ID is empty";
    } else {
        $stmt = $conn->prepare("DELETE FROM todos WHERE id=?");
        $res = $stmt->execute([$id]);

        if ($res) {
            echo "Record deleted successfully";
        } else {
            echo "Failed to delete record";
        }
        $conn = null;
        exit();
    }
} else {
    echo "ID is not set";
}
