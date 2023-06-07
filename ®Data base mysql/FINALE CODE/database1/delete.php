<?php
require_once('product.php');

$pr = isset($_GET['prid']) ? $_GET['prid'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Delete Product</title>
    <style>
        body {
            padding: 240px 0;
            text-align: center;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('background1.jpg') no-repeat;
            background-size: cover;
            background-position: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 5px;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 30px;
            color:white;
        }

        p {
            margin-bottom: 50px;
        }

        label {
            display: block;
            font-weight: bold;
            font-size: 18px;
            color: white;
            margin-bottom: 10px;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .block, .bloc {
            display: inline-block;
            border: none;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            margin: 0 10px;
            border-radius: 5px;
            width: 100px;
            color: white;
            transition: background-color 0.2s;
        }

        .block {
            background-color: #FF0000;
        }

        .bloc {
            background-color: #A0FFA0;
        }

        .block:hover {
            background-color: #cc0000;
        }

        .bloc:hover {
            background-color: #80ff80;
        }

        .form {
            color: white;
        }
        i{
            color:white;
            
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Are you sure you want to delete this?</h1>
        <label><?php echo $pr; ?></label>
        <i class="fas fa-trash-can"></i>
        <form action="productroute.php" method="POST"> 
            <input type="hidden" name="fname" value="<?php echo $pr; ?>">
            <input type="submit" class="block" name="submit" value="DELETE">
            <input type="submit" class="bloc" name="submit" value="NO">
        </form
