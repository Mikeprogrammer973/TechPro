<?php
include("contador_acesso.php");
statistic_access("acess_delete-account_count");
@$id = $_REQUEST['id'];

include("db_conection.php");

$sql = "DELETE FROM `users` WHERE `users`.`id` = $id;";

if(mysqli_query($link,$sql)){
    header("location:logout.php");
}
mysqli_close($link);
?>