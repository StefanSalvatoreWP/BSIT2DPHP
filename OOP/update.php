<?php
    require_once("config.php");
    $data = new config();
    $id = $_GET['id'];
    $data->setId($id); 

    if(isset($_POST['update'])) {
        $data->setFirstname($_POST['firstname']);
        $data->setLastname($_POST['lastname']);
        $data->setAge($_POST['age']);
        $data->setAddress($_POST['address']);
        $data->setGender($_POST['gender']);
        $data->setNationality($_POST['nationality']);

        echo $data->update();
        echo "<script>alert('Update Success!');document.location='index.php'</script>";
    }
    
    $record = $data->fetchOne();
    $val=$record[0];
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

    <form action="" method="post" style="padding:10% 35% 0 35%;">
        <h1 class="modal-title fs-5" id="exampleModalLabel2">Update Employee</h1>
        <div class="input-group mb-2">
            <span class="input-group-text" id="input-group-left-example"><i class='fas fa-user-alt' style='font-size:24px;color:#F39C12'></i></span>
            <input type="text" class="form-control" placeholder="Firstname" aria-label="firstname" aria-describedby="input-group-left" name="firstname" value="<?php echo ucwords($val['firstname']); ?>">
         </div>
        <div class="input-group mb-2">
            <span class="input-group-text" id="input-group-left-example"><i class='fas fa-user-alt' style='font-size:24px;color:#F39C12'></i></span>
            <input type="text" class="form-control" placeholder="Lastname" aria-label="lastname" aria-describedby="input-group-left" name="lastname"value="<?php echo ucwords($val['lastname']); ?>">
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text" id="input-group-left-example"><i class='fas fa-child' style='font-size:30px;color:#F39C12'></i></span>
            <input type="text" class="form-control" placeholder="Age" aria-label="age" aria-describedby="input-group-left" name="age"value="<?php echo ucwords($val['age']); ?>">
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text" id="input-group-left-example"><i class='fas fa-address-book' style='font-size:26px;color:#F39C12'></i></span>
            <input type="text" class="form-control" placeholder="Address" aria-label="address" aria-describedby="input-group-left" name="address"value="<?php echo ucwords($val['address']); ?>">
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text" id="input-group-left-example"><i class='fas fa-restroom' style='font-size:19px;color:#F39C12'></i></span>
            <input type="text" class="form-control" placeholder="Gender" aria-label="gender" aria-describedby="input-group-left" name="gender"value="<?php echo ucwords($val['gender']); ?>">
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text" id="input-group-left-example"><i class='fas fa-flag' style='font-size:24px;color:#F39C12'></i></span>
            <input type="text" class="form-control" placeholder="Nationality" aria-label="nationality" aria-describedby="input-group-left" name="nationality"value="<?php echo ucwords($val['nationality']); ?>">
        </div>
        <div class="modal-footer">
            <a href="index.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>&nbsp;
            <input type="submit" name="update" value="update" class="btn btn-primary">
        </div>
    </form>
    
    <div class="fixed-bottom bd-highlight">Fixed bottom</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
