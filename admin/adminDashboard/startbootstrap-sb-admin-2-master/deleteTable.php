<?php 

require_once '../../../Models/Database/dbConnect.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "delete from `tables` where id=$id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:tables.php');
    } else{
        die(mysqli_error($conn));
    }
}