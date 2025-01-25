<?php
session_start();

$link = mysqli_connect();

if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
    echo $user.'さん'.'<br>';
 }else{
     header("Location: ../login/login.php");
}


$favorite = $_SESSION['favorite'];
var_dump($favorite);

$sql = "select * from corporate where sequenceNumber = '$favorite';";

$result = mysqli_query($link,$sql);
$data = array();
foreach($result as $row){
    $data[] = $row;
}

//var_dump($data);

?>