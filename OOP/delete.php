<?php
    require_once("config.php");
    $record = new config();

    if(isset($_GET['id']) && isset($_GET['reqToDelete'])) {
        if($_GET['reqToDelete'] == 'delete') {
            $record->setId($_GET['id']);
            $record->delete();

            echo "<script>alert('Delete Success!');document.location='index.php'</script>";
        }
    }

?>