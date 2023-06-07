<?php
    require_once("config.php");
    $data = new config();
    $row = $data->read();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD | TEAM BLACK</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="icon" href="icon.jpg">
</head>
  <body>
    <h1 id="h1">Employee List</h1>
    <table class="table-responsive">
        <table class="table table-borderless">
        <thead>
            <th scope="col">#</th>
            <th scope="col">FIRSTNAME</th>
            <th scope="col">LASTNAME</th>
            <th scope="col">AGE</th>
            <th scope="col">ADDRESS</th>
            <th scope="col">GENDER</th>
            <th scope="col">NATIONALITY</th>
            <th scope="col">DATE & TIME</th>
            <th>
                <!-- Button trigger modal -->
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="add-btn">
                    Add Employee
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- CREATE FORM -->
                        <form action="create-process.php" method="post">
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="input-group-left-example"><i class='fas fa-user-alt' style='font-size:24px;color:#2ECC71'></i></span>
                                <input type="text" class="form-control" placeholder="Firstname" aria-label="firstname" aria-describedby="input-group-left" name="firstname">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="input-group-left-example"><i class='fas fa-user-alt' style='font-size:24px;color:#2ECC71'></i></span>
                                <input type="text" class="form-control" placeholder="Lastname" aria-label="lastname" aria-describedby="input-group-left" name="lastname">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="input-group-left-example"><i class='fas fa-child' style='font-size:30px;color:#2ECC71'></i></span>
                                <input type="text" class="form-control" placeholder="Age" aria-label="age" aria-describedby="input-group-left" name="age">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="input-group-left-example"><i class='fas fa-address-book' style='font-size:26px;color:#2ECC71'></i></span>
                                <input type="text" class="form-control" placeholder="Address" aria-label="address" aria-describedby="input-group-left" name="address">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="input-group-left-example"><i class='fas fa-restroom' style='font-size:19px;color:#2ECC71'></i></span>
                                <input type="text" class="form-control" placeholder="Gender" aria-label="gender" aria-describedby="input-group-left" name="gender">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="input-group-left-example"><i class='fas fa-flag' style='font-size:24px;color:#2ECC71'></i></span>
                                <input type="text" class="form-control" placeholder="Nationality" aria-label="nationality" aria-describedby="input-group-left" name="nationality">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" name="add" value="Add">
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            </th>
        </thead>
        <tbody>
            <?php
                foreach($row as $key => $val){
            ?>
                <tr>
                    <td><?=$val['id']?></td>
                    <td><?=ucwords($val['firstname']);?></td>
                    <td><?=ucwords($val['lastname']);?></td>
                    <td><?=ucwords($val['age']);?></td>
                    <td><?=ucwords($val['address']);?></td>
                    <td><?=ucwords($val['gender']);?></td>
                    <td><?=ucwords($val['nationality']);?></td>
                    <td><?=ucwords($val['time']);?></td>
                    <td>
                        <a href="update.php?id=<?=$val['id']?>";><button type="button" class="update-btn">update</button></a>
                        <a href="delete.php?id=<?=$val['id']?>&reqToDelete=delete"><button type="button" class="delete-btn">delete</button></a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>
        </table>
    </table>
    <div class="fixed-bottom bd-highlight footer"><b style="color:#E74C3C;">Created by:</b> <i>Johnmil</i> | <i>John Paolo</i>  | <i>JV Kim</i> | <b style="color:#E74C3C;">IM-1 SEMI-FINAL PROJECT</b></div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  </body>
</html>
