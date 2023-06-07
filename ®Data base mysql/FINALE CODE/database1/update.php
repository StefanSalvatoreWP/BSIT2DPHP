<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            padding: 200px 0;
            text-align: center;
            background: url('background1.jpg') no-repeat;
            background-size: cover;
            background-position: center;
        }
        label{
            position: relative;
             width: 400px;
	         padding: 20px;
	         border-radius: 10px;
             text-align: center;
             background: transparent;
             border-radius: 20px;
             border: 2px solid rgba(255, 255, 255, .5);
             backdrop-filter: blur(20px);
             box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            justify-content: center;
           
        }
        
        .shesh{
            background-color: #1F51FF; 
            width: 20%;
             border: none;
            font-size: 16px;
             cursor: pointer;
             border-radius: 20px;
             border: 2px solid rgba(255, 255, 255, .5);
            text-align: center;
        }
        

    </style>
</head>
<body>
 <a href='productentry.php'>Return</a>
    <div class="container">
    
    <form action="update1.php" method='POST'>
    
        <label for="">
        <h1>Update</h1>
        ID: <br>
            <input type="text" name='id' required><br>
        FirstName: <br>
            <input type="text" name='fname' required><br>
            LastName: <br>
            <input type="text" name='lname' required><br>
            Email: <br> 
            <input type="text" name='email' required><br>
            <input type="submit" class="shesh" name='Change' value='Change'>
        </label>
    </form>
    </div>
</body>
</html>