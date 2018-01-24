<meta charset="utf-8" />
<?php 
//定义类
class GirlFriend{
    public $name;
    public $age;
    public $gendor;

    //构造方法: 实例化类时，自动调用的方法
    public function __construct($name, $age, $gendor){
        //在类的内部需要调用类的属性和方法时，必须使用$this指针。
        $this->name = $name;
        $this->age = $age;
        $this->gendor = $gendor;
    }

    public function eat(){
        echo $this->name."大吃货";
    }

    public function aaa(){
        echo "aaa";
    }

    public function bbb(){
        echo 'bbb';
    }
}

$gl = new GirlFriend('林志玲', 40, '女');

$gl->eat();
print_r($gl);
?>