<?php
require_once("TaskDatabase.php");
require_once("server.php");

session_start();
$user = $_SESSION['user'] ?? null;

$task = new TaskDatabase();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($user) { 
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $task->addTask($name, $description, $user['id']);
        } elseif (isset($_POST['update'])) {
            $taskId = $_POST['taskId'];
            $status = $_POST['status'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $task->updateTaskStatus($taskId, $status, $name, $description);
        } elseif (isset($_POST['delete'])) {
            $taskId = $_POST['taskId'];
            $task->deleteTask($taskId);
        }
    } elseif (isset($_POST['signup'])) {
        $username = $_POST['signup-username'];
        $password = $_POST['signup-password'];
        $task->signupUser($username, $password);
    } elseif (isset($_POST['login'])) {
        $username = $_POST['login-username'];
        $password = $_POST['login-password'];
        $user = $task->loginUser($username, $password);
        if ($user) {
            $_SESSION['user'] = $user;
        }
    }
}

if ($user) {
    $userId = isset($user['id']) ? $user['id'] : null;
    $tasks = $task->getUserTasks($userId);
} else {
    $tasks = [];
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
     <title>Task Tracker</title>
    

</head>
<body>

<div class="sideBar">
<?php if ($user): ?>
    <div>
        <p class="userName">Welcome, <?php echo $user['username']; ?></p>
        <hr>
        <a href="logout.php"> <input class="logOutButton" type="text" value="Logout"> </a>
        <div class="addTaskContainer">
        <input type="submit" class="addTask" name="add" class="btn btn-primary" value="Add Task">
        <form method="POST" action="">
            <div class="taskNameContainer mb-3">
                <label for="name">Task Name:</label>
                <input class="taskInput" type="text" class="form-control" name="name" id="name" required>
                <br>
            </div>
            <div class="mb-3">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" id="description" required></textarea>
                <br>
            </div>

            
        </form>
        </div>
      
    </div>
<?php else: ?>
    <div>
        <button id="loginButton" class="btn btn-primary">Login</button>
        <button id="signupButton" class="btn btn-primary">Signup</button>
    </div>
<?php endif; ?>
</div>

<div class="MiddleContainer">
<h1>Your Daily task tracker</h1>
    <div class="searchBarContainer">
        <input class="searchInput" type="text" id="searchInput" onkeyup="searchTasks()" placeholder="Search by name">
    </div>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Status</th>
        <th scope="col">Created_at</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <?php foreach ($tasks as $taskItem): ?>
        <tr>
            <td><?= $taskItem['name'] ?></td>
            <td><?= $taskItem['description'] ?></td>
            <td><?= $taskItem['status'] ?></td>
            <td><?= $taskItem['created_at'] ?></td>
            <td>
                <form method="POST" action="">
                    <input type="hidden" name="taskId" value="<?= $taskItem['id'] ?>">
                    <input type="submit" name="delete" class="btnDelete" value="Delete">
                </form>
                <button type="button" class="btnUpdate">Update</button>
                <div class="container-overlay edit-container" style="display: none;">
                    <form method="POST" action="">
                        <input type="hidden" name="taskId" value="<?= $taskItem['id'] ?>">
                        <div class="mb-3">
                            <label for="name">Task Name:</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   value="<?= $taskItem['name'] ?>" required>
                            <br>
                        </div>
                        <div class="mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control"
                                      id="description" required><?= $taskItem['description'] ?></textarea>
                            <br>
                        </div>
                        <div class="mb-3">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control" required>
                                <option value="Pending" <?= $taskItem['status'] === 'Pending' ? 'selected' : '' ?>>
                                    Pending
                                </option>
                                <option value="Completed"
                                    <?= $taskItem['status'] === 'Completed' ? 'selected' : '' ?>>Completed</option>
                            </select>
                            <br>
                        </div>
                        <div class="mb-3">
                            <label for="created_at">Created At:</label>
                            <input type="text" class="form-control" name="created_at" id="created_at"
                                   value="<?= $taskItem['created_at'] ?>" required>
                            <br>
                        </div>
                        <input type="submit" name="update" class="btn btn-primary" value="Update">
                        <button type="button" class="btn btn-secondary cancel-edit">Cancel</button>
                    </form>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
</div>
  
    


    <div class="card-body">
        
    </div>





<div class="container-overlay" id="signup-container" style="display: none;">
    <form method="POST" action="">
        <h3>Signup</h3>
        <div class="mb-3">
            <label for="signup-username">Username:</label>
            <input type="text" class="form-control" name="signup-username" id="signup-username" required>
        </div>
        <div class="mb-3">
            <label for="signup-password">Password:</label>
            <input type="password" class="form-control" name="signup-password" id="signup-password" required>
        </div>
        <input type="submit" name="signup" class="btn btn-primary" value="Signup">
        <button type="button" class="btn btn-secondary cancel-signup">Cancel</button>
    </form>
</div>

<div class="container-overlay" id="login-container" style="display: none;">
    <form method="POST" action="">
        <h3>Login</h3>
        <div class="mb-3">
            <label for="login-username">Username:</label>
            <input type="text" class="form-control" name="login-username" id="login-username" required>
        </div>
        <div class="mb-3">
            <label for="login-password">Password:</label>
            <input type="password" class="form-control" name="login-password" id="login-password" required>
        </div>
        <input type="submit" name="login" class="btn btn-primary" value="Login">
        <button type="button" class="btn btn-secondary cancel-login">Cancel</button>
    </form>
</div>

<script>
    const editButtons = document.querySelectorAll('.open-edit');
    const editContainers = document.querySelectorAll('.edit-container');
    const cancelButtons = document.querySelectorAll('.cancel-edit');

    editButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            editContainers[index].style.display = 'flex';
            document.body.style.overflow = 'hidden'; 
        });
    });

    cancelButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            editContainers[index].style.display = 'none';
            document.body.style.overflow = 'auto'; 
        });
    });

    function searchTasks() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toUpperCase();
        const table = document.querySelector('table');
        const rows = table.getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            const nameColumn = rows[i].getElementsByTagName('td')[0]; 
            if (nameColumn) {
                const nameValue = nameColumn.textContent || nameColumn.innerText;
                if (nameValue.toUpperCase().indexOf(filter) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    }

    const signupButton = document.getElementById('signupButton');
    const signupContainer = document.getElementById('signup-container');
    const cancelSignupButton = document.querySelector('.cancel-signup');

    signupButton.addEventListener('click', () => {
        signupContainer.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    });

    cancelSignupButton.addEventListener('click', () => {
        signupContainer.style.display = 'none';
        document.body.style.overflow = 'auto';
    });

    const loginButton = document.getElementById('loginButton');
    const loginContainer = document.getElementById('login-container');
    const cancelLoginButton = document.querySelector('.cancel-login');

    loginButton.addEventListener('click', () => {
        loginContainer.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    });

    cancelLoginButton.addEventListener('click', () => {
        loginContainer.style.display = 'none';
        document.body.style.overflow = 'auto';
    });
</script>

</body>
</html>
