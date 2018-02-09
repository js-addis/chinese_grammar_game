<?php

require('database.php');
$db = db_connect();

if(isset($_GET['delete'])) {
    $delete = $_GET['delete'];

    $sql = "DELETE FROM characters WHERE english='$delete'";

    $result = mysqli_query($db, $sql);
}

?>
