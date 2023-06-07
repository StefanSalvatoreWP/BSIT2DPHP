<?php
    // Start the session
    session_start();

    // Check if the user is not logged in, redirect to the login page
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit;
    }

    // Get the logged-in user's name
    $username = $_SESSION['username'];

    require_once('contacts.php');
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="Search.js"></script>
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
            .center{
        text-align: center;  /*ang info matunga or mahipos dili kay mahugaw*/ 
        margin: 5px;
    }
    .btn {
        border-radius: 2px;
        border: 0px;
        font-size: medium;
        font-weight: 600;
            margin: 1rem;
            padding: 0.5rem 1.2rem;
            text-transform: uppercase;
            white-space: nowrap;    
            cursor: pointer;
            align-items: center;
            /*for the button submit style*/
    }
    .btn--primary {
        background: rgb(27, 26, 26);
        color: white;
    }
    .btn--primary:hover {
        background: rgb(170, 170, 170);
    }

        
        </style>
    </head>
    <body>
    <div class="center">
        Logged in as: <?php echo $username; ?>
    </div>
        <a href="logout.php"><button>Logout</button></a>
        <form action="contactroute.php" method='POST'>
            <div class ="center" label for="">
            Contact Name:
                <input type="text" name='Contact_Name'>
            </label>
            </div>
        <div class ="center" label for="">
                Tel Number:
                <input type="text" name='Tel_Number'>
                </div>
            </label>
            <div class ="center" label for="">
                Address:
                <input type="text" name='Address'>
                </div>
            </label>
            
            <div class ="center" label for="">
                Relation:
                <input type="text" name='Relation'>
                
            </label>
            <br>
            <input hidden type="text" name="hidden_value" id="hidden_value" value="Save">
            <input type="submit" class="btn btn--primary" name='submit' value='Add to Contacts'>

        </form>
        
        <div class='tbl-contacts' >
        <center>
            <table >
                <thead>
                    <tr >
                    
                        <th>Contact Name</th>
                        <th>Tel Number</th>
                        <th>Address</th>
                    <th>Relation</th>
                        <th>Action</th>
    <br>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $user = new contacts();
                        echo $user->getAllcontacts();
                    ?>
                    
                </tbody>
            </table>
        
            
    </label>
            <br>
    <div class="center">
            <input type="text" id="search" onkeyup="searchTask()" placeholder="Search Contact">
        </div>
                
    </center>

        </div>
    </body>
    </html>