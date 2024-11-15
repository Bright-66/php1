<style>
* {
    font-family: 'courier new';
}
</style>
 <!-- <form action="?">
<input type="number" name='line'>
<button type='submit'>Submit</button>

</form>   -->

<?php 
//  $line = (isset($_GET['line']))?$_GET['line']:5;
//  starts($line);

function starts($shape,$line){
switch($shape){
    case "正三角形":
    for($i=0;$i<$line;$i++){
    
        for($k=0;$k<$line-1-$i;$k++){
            echo "&nbsp;";
        }
    
        for($j=0;$j<(2*$i+1);$j++){
            echo "*";
        }
        echo "<br>";
    }
break;
    case "倒直角三角形":
        for($i=0;$i<$line;$i++){
            for($j=$line;$j>=($i+1);$j--){
               echo "*";
            } 
            echo "<br>";
          } 
        
          for($i=$line-1;$i>=$line;$i--){
            for($j=0;$j<($i+1);$j++){
               echo "*";
            } 
            echo "<br>";
          } 
          break;  
        }
    }
    function all($table){
        $dsn="mysql:host=localhost;charset=utf8;dbname=crud";
        $pdo=new PDO($dsn,'root','');
        $sql="select * from $table";
        $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
        // 回傳$rows(抓取資料庫的資料表) 給function all($table)函式!
    }
?>