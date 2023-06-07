<?php
    require_once('student.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label{
            padding:5px;
            display:block;
        }
        table{
            border-collapse: collapse;
            border:1px solid black;
        }
        table,th{
            border:1px solid black;
        }
        .tbl-product{
            margin-top:10px;
        }
        table,tr,td{
            border:1px solid black;
        }
    </style>
</head>
<body>
    <form action="studentroute.php" method='POST'>
        <label for="">
            First Name:
            <input type="text" name='firstname' autocomplete="off">
        </label>
        <label for="">
            Last Name:
            <input type="text" name='lastname' autocomplete="off">
        </label>
        <label for="">
            Age:
            <input type="text" name='age' autocomplete="off">
        </label>
     
            <input type="submit" name='submit' value='Save'>
      
    </form>
    <div class='tbl-product'>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $studentlist = new Student();
                    echo $studentlist->getAllStudents();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>