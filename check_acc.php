<?php 
// session_start();
if(!isset($_POST['acc'])){
    header("location:login.php");
    exit();
}

$acc=$_POST['acc'];
$pw=$_POST['pw'];

if($acc=='admin' && $pw=='1234'){
  echo "帳密正確:登入成功";
//   time()+180 為讓cookie有效180sec.180sec後 cookie即消失!
    setcookie("login","$acc",time()+180);
    echo $_COOKIE['login'];
    // $_SESSION['login']=$acc;
    echo "<br><a href='login.php'>回首頁</a>";
}else{
    echo "帳密錯誤:登入失敗";

}


?>