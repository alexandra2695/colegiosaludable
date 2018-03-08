<?php
require 'funcs/conexion.php';
$codalum = 1;

$sql = "select * from alumno where codalum='$codalum'";
    $result = mysqli_query($mysqli, $sql) or die("Error in Selecting " . mysqli_error($mysqli));

    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);

    //close the db connection
    mysqli_close($mysqli);
?>