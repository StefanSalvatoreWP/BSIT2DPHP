<?php
require_once("TaskDatabase.php");
require_once("server.php");

$task = new TaskDatabase();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $task->addTask($name, $description);
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
}

// Get all tasks
$tasks = $task->getAllTasks();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Task Tracker</title>
    <style>
        .container-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
            backdrop-filter: blur(5px);
        }

        .container-overlay form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        h1{
            font-family: "Times New Roman", Times, serif;
            font-weight: 800 ;
            letter-spacing: 10px;
            
        }
        h2{
            font-family: "Times New Roman", Times, serif;
            font-weight: 800 ;
            letter-spacing: 10px;
        }
        #ann{
            /* outline:solid black ; */

        }
      
        body {
            background: ;
            margin: 8%;
        }
        #yow{
            font-family:  Times, serif;
            font-weight: 800;
        }
        #name{
            width: 300px;
            height: 50px;
            border: 1px solid black;
        }
        #description{
            width: 300px;
            height: 100px;
            padding: 10px;
            border: 1px solid black;
        }
        .searchBarContainer{
            margin: 10px;
        }
        
        #ant{
            font-family: "Times New Roman", Times, serif;
        }
        #save{
        border: none;
        background-color: #2ecc71;
        }
    </style>

</head>
<body>

<center>
    <h1>Task Management System</h1>
    <div class="searchBarContainer">
        <input type="text" id="searchInput" onkeyup="searchTasks()" placeholder="Search by name">
    </div>
</center>

<center>
    <div class="card-body">
        <form method="POST" action="" id="ann">
            <div class="mb-3" >
                <label for="name" id="ant">Full Name:</label>
                <input type="text" class="form-control" name="name" id="name" required>
                <br>
            </div>
            <div class="mb-3" >
                <label for="description" id="ant">Description:</label>
                <textarea name="description" class="form-control" id="description" required></textarea>
                <br>
            </div>

            <input type="submit" name="add" class="btn btn-primary"  id="save"value="Add Task" >
        </form>
    </div>
</center>

<h2>Task List</h2>

<table class="table table-bordered table-striped">
    <thead>
    <tr id="yow">
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Status</th>
        <th scope="col">Created_at</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <?php foreach ($tasks as $taskItem): ?>
        <tr id="yow">
            <td><?= $taskItem['id'] ?></td>
            <td><?= $taskItem['name'] ?></td>
            <td><?= $taskItem['description'] ?></td>
            <td><?= $taskItem['status'] ?></td>
            <td><?= $taskItem['created_at'] ?></td>
            <td>
                <!-- <form method="POST" action="">
                    <input type="hidden" name="taskId" value="<?= $taskItem['id'] ?>">
                    <input type="submit" name="delete" class="btn btn-danger" value="Delete">
                </form> -->
                <button type="button" class="btn btn-primary open-edit">Update</button>
                <div class="container-overlay edit-container" style="display: none;">
                    <form method="POST" action="">
                        <input type="hidden" name="taskId" value="<?= $taskItem['id'] ?>">
                        <div class="mb-3">
                            <label for="name">Full Name:</label>
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
            const nameColumn = rows[i].getElementsByTagName('td')[1];
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
</script>

</body>
</html>
