<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC");
    $output = "";
    
    if(mysqli_num_rows($sql) == 0){
        $output .= "No hay usuarios disponibles para chatear";
    }elseif(mysqli_num_rows($sql) > 0){
        include "data.php";
    }
    echo $output;
?>