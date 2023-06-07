<!DOCTYPE html>
<html>
<head>
    <title>View Reminders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>LISTS</h1>
        <?php
        session_start();
        if(isset($_SESSION['message'])){
            echo '<p class="success-message">' . $_SESSION['message'] . '</p>';
            unset($_SESSION['message']);
        }
        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>DATE & TIME</th>
                        <th>DESCRIPTIONS</th>
                        <th class="text-center">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once('connection.php');

                    $database = new Connection();
                    $db = $database->open();

                    try {
                        $sql = 'SELECT * FROM reminder';
                        foreach ($db->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['title'] . '</td>';
                            echo '<td>' . $row['date_time'] . '</td>';
                            echo '<td>' . $row['description'] . '</td>';
                            echo '<td class="text-center">
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_' . $row['id'] . '">Delete</button>
                                  </td>';
                            echo '</tr>';
                        }
                    } catch(PDOException $e) {
                        $_SESSION['message'] = "There is some problem in connection: " . $e->getMessage();
                    }

                    $database->close($db);
                    ?>
                </tbody>
            </table>
        </div>

        <a href="index.php" class="btn btn-outline-info">BACK</a>
    </div>

    <?php include 'modal.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
