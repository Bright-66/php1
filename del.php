<?php
// 檢查 非數字或非規定的字時  
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    echo "非法使用";
    exit();
}

$dsn="mysql:host=localhost;charset=utf8;dbname=crud";
$pdo=new PDO($dsn,'root','');

$id=$_GET['id'];
$sql="delete from member where id='$id'";

$pdo->exec($sql);

header("location:success.php");
?>