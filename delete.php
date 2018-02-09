<?php

require('database.php');
$db = db_connect();

$english = $_POST['english'];

$sql = "DELETE FROM characters WHERE english= " . $english . " LIMIT 1";

$result = mysqli_query($db, $sql);

?>
