<?php echo " <h1 style='direction:rtl;text-align:center;'> آموزش مقدماتی تا پیشرفته PHP8  با کانال یوتیوب Root One <br></h1>";

// class person{
//     public $name;
//     public $age;

//     function set_name($n){
//         $this->name = $n;
//     }

//     function set_age($a){
//         $this->age = $a;
//     }

//     function say_hi(){
//         echo "welcome ". $this->name;
//     }
// }

// $p = new person();
// $p->set_name('reza');
// $p->say_hi();

// echo  "<br>";

// $p->set_name('ali');
// $p->say_hi();



// class person
// {
//     private $name;
//     private $age;
//     protected $lname;

// public function set_name($name){
//  $this->name= $name;
// }

// function set_lname($lname){
//     $this->lname= $lname;
// }




// function get_name(){
//     return $this->name;
// }

// function __construct($a, $n)
// {
//     $this->name = $n;
//     $this->age = $a;
// }



// function __destruct()
// {
//     echo "destruc runnig...";
// }
// }

// class student extends person{
//     public $std_id = '12345';

//     function printinformation(){
//         echo 'id: '.$this->std_id." <br> name: ". $this->lname;
//     }
// }


// $std = new student();

// $std->set_lname('reza');

// $std->printinformation();





// $p = new person('25', 'reza');
// echo $p->name;
// echo $p->age;
// echo $p->lname;

// $r= new person();

// $r->set_name('reza');

// $name = $r->get_name();

// var_dump($r->get_name());


// $b= new person();

// $b->set_name('ali');

// $name = $b->get_name();

// var_dump($b->get_name());



trait message
{
    public function welcome()
    {
        echo "welcome bro";
    }


    public function welcome2()
    {
        echo "welcome bro";
    }
    public function welcome3()
    {
        echo "welcome bro";
    }
    public function welcome4()
    {
        echo "welcome bro";
    }
}

class strudent
{
    use message;

    const std_id = '12345';
    public static $name = 'reza';
    function student_info()
    {
        echo 'id:' . self::std_id . "<br>";
    }
}


$p = new strudent();

$p->welcome3();

// $p ->student_info();

// echo "id2 :". strudent::std_id;

// echo "<br>name :". strudent::$name;





?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RootOne</title>
</head>

<body>

</body>

</html>