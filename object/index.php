<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>物件導向</title>
</head>
<body>
<h1>物件的宣告</h1>

<!-- 這個 Animal 類別具有基本的屬性（如動物的類型、名字、毛色和腳）和方法（如跑步、顯示速度、獲取和設置名字等）。
 這是一個簡單的物件導向設計，您可以基於這個類別進行擴展或修改，例如繼承這個類別來創建更具體的動物類型（如狗、貓等）。 -->

<?php

class Animal{
protected $type='animal';
protected $name='John';
protected $hair_color='black';
private $feet=['front-left','front-right','back-left','back-right'];

  function __construct($type,$name,$hair_color){
    $this->type=$type;
    $this->name=$name;
    $this->hair_color=$hair_color;
  }

    function run(){
    echo $this->name.' is running';
  }
  
  public function speed(){
    echo $this->name.' is running at 20km/h';
  }

  public function getName(){
    return $this->name;
  } 

  public function setName($name){
        $this->name=$name;
  } 
  function getFeet(){
    return $this->feet;
}

}
//實例化(instance):
// 這行代碼創建了一個 Animal 類別的物件實例 $cat。
// new Animal('cat', 'Kitty', 'white') 呼叫了 Animal 類別的構造函數 __construct，並傳遞了三個參數：
// 'cat'：設置動物的類型為 "cat"。
// 'Kitty'：設置動物的名字為 "Kitty"。
// 'white'：設置動物的毛色為 "white"。
// 在構造函數內，這些值會被賦給對應的屬性 $type、$name 和 $hair_color。

$cat=new Animal('cat','Kitty','white');
print_r($cat->getFeet());
//echo $cat->type;
echo $cat->getName();
//echo $cat->hair_color;
echo $cat->run();
echo $cat->speed();
//print_r($cat->feet);

// setName('Mary') 方法將 Kitty 的名字更改為 'Mary'。不過，這個方法並不返回任何值，
// 實際上這行代碼的輸出會是 null（因為 setName 沒有返回任何東西）。
// 隨後，getName() 被再次呼叫，會返回更新後的名字 'Mary'。所以這行代碼會輸出 

echo $cat->setName('Mary');
echo $cat->getName();


?>

<h1>繼承</h1>
<?php
// 這段程式碼定義了一個名為 Cat 的類別，它繼承自 Animal 類別並實現了 Behavior 介面。

class Cat extends Animal implements Behavior{
    protected $type='cat';
    protected $name='Kitty';
    function __construct($hair_color){
        $this->hair_color=$hair_color;
    }

    function jump(){
        echo $this->name . " jumpping 2m";
    }

/*     function getFeet(){
        return $this->feet;
    } */
}

Interface Behavior{
    public function run();
    public function speed();
    public function jump();
}

// Cat 類別使用 extends 關鍵字來繼承 Animal 類別。這意味著 Cat 類別將繼承 Animal 類別中的屬性和方法。
// 具體來說，Cat 類別會繼承 Animal 類別的 type、name、hair_color、feet 屬性以及 run()、speed()、getName() 等方法。

// implements Behavior 表示 Cat 類別必須實現名為 Behavior 的介面。這表示 Cat 類別需要提供 Behavior 介面中定義的方法。
// 如果 Behavior 介面中有一些方法，則 Cat 類別必須實作這些方法。

// 總結：
// Cat 類別繼承了 Animal 類別的屬性和方法，並且定義了自己的 type 和 name 屬性值。
// Cat 類別通過自己的建構子來設置 hair_color 屬性，並且新增了 jump() 方法，表示貓的跳躍行為。
// Cat 類別實現了 Behavior 介面，但由於該介面在此段代碼中並未顯示定義，因此無法確定具體有哪些方法需要被實現。
// 一般來說，Behavior 介面會包含一組未實作的方法，Cat 類別需要提供這些方法的具體實現。

$mycat=new Cat('white');

print_r($mycat->getFeet());
echo $mycat->getName();
echo "<br>";
echo $mycat->run();
echo "<br>";
echo $mycat->speed();
echo "<br>";
$mycat->setName("judy");

echo $mycat->getName();
echo "<br>";
echo $mycat->jump();

//echo Cat::name;
?>

<H1>靜態宣告</H1>
<?php

// 定義了一個名為 Dog 的類別，它繼承自 Animal 類別並實現了 Behavior 介面。
// Dog 類別中包含了許多方法和屬性，並且使用了 static 關鍵字來跟踪創建的 Dog 類別實例數量

// Dog 類別繼承自 Animal 類別，這意味著它會繼承 Animal 類別中的屬性和方法
// （如 type, name, hair_color, feet 和方法如 run()、speed() 等）。
// Dog 類別還實現了 Behavior 介面，這意味著它必須實現介面中定義的所有方法（儘管在這段程式碼中，Behavior 介面並未顯示）。
// 屬性 type 和 name 分別設置為 'dog' 和 'Doggy'，這是 Dog 類別的預設值。
// static $count 是一個靜態屬性，用來計算創建的 Dog 實例數量。靜態屬性屬於類別本身，而不是某個具體的物件，
// 因此它可以在類別的所有實例中共享。

class Dog extends Animal implements Behavior{
    protected $type='dog';
    protected $name='Doggy';
    protected static  $count=0;
    //static $count=0;

//     構造函數接受一個參數 $hair_color，並將其設置為 Dog 物件的 hair_color 屬性。
// self::$count++ 這一行表示每次創建一個新的 Dog 物件時，靜態屬性 $count 會自動增加 1。
// 這樣就能夠追蹤創建了多少個 Dog 實例。構造函數接受一個參數 $hair_color，並將其設置為 Dog 物件的 hair_color 屬性。
    
    function __construct($hair_color){
        $this->hair_color=$hair_color;
        self::$count++;
    }


    function bark(){
        echo $this->name . " is barking";
    }

    function getFeet(){
        return $this->feet;
    }

    // getCount() 是靜態方法，可以直接通過 Dog 類別來調用，而無需創建 Dog 類別的實例。
    // 這個方法返回靜態屬性 $count，即創建的 Dog 物件的數量

    static function getCount(){
        return self::$count;
    }

    function jump(){
        echo $this->name . " jumpping 1m";
    }
}

echo Dog::getCount();

$dog1=new Dog('brown');
$dog2=new Dog('black');
$dog3=new Dog('orange');
$dog4=new Dog('white');
$dog5=new Dog('white');
echo Dog::getCount();

// Dog 類別的靜態屬性 $count 用來計算創建了多少個 Dog 類別的實例。
// 靜態屬性和方法是與類別本身相關聯的，而不是與對象實例相關聯的。
// 靜態方法 getCount() 可以直接通過類別名稱來調用，而無需創建實例。

?>
</body>
</html>