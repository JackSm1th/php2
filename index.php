<?
header("Content-Type: text/html; charset=utf-8");
class Good {
    private $id;
	private $name;
	private $description;
	private $price;
	private $amount;
	function __construct($id, $name, $description, $price, $amount){
		$this->id = $id; // Уникальный id
		$this->name = $name; // Название
		$this->description = $description; // Описание
		$this->price = $price; // Цена за единицу
		$this->amount = $amount; // Остаток на складе
	}
	function changeInfo($id, $name, $description, $price, $amount){
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
		$this->amount = $amount;
	}
	function getInfo(){
		$info = array($this->id, $this->name, $this->description, $this->price, $this->amount);
		return $info;
	}
}

class Axe extends Good {
	private $material;
	private $weight;
	function __construct($id, $name, $description, $price, $amount, $material, $weight){
		parent::__construct($id, $name, $description, $price, $amount); // Что не так с наследованием???
		$this->material = $material; // Материал 
		$this->weight = $weight; // Вес изделия
   	}
   	function changeInfo($id, $name, $description, $price, $amount, $material, $weight){
   		parent::changeInfo($id, $name, $description, $price, $amount); // Что не так с наследованием???
		$this->material = $material; // Материал 
		$this->weight = $weight; // Вес изделия
	}
	function getInfo(){
		$info = array($this->id, $this->name, $this->description, $this->price, $this->amount, $this->material, $this->weight);
		return $info;
	}
};

function goodInfo($array){
	echo "ID: ".$array[0]."<br>";
	echo "Name: ".$array[1]."<br>";
	echo "Description: ".$array[2]."<br>";
	echo "Price: ".$array[3]."<br>";
	echo "Amount: ".$array[4]."<br>";
	if (isset($array[5])){
		echo "Material: ".$array[5]."<br>";
		echo "Weight: ".$array[6]."<br>";
	}
}

$good000 = new Good(0, "Дрова", "Целый вагон дров", 5000, 5);
$good000->changeInfo(0, "Дрова", "Целый вагон дров", 5000, 4); 
goodInfo($good000->getInfo());

$good001 = new Axe(1, "Топорище", "очень мощный", 7000, 5, "сталь", 3000);
$good001->changeInfo(1, "Топорище", "очень мощный", 7000, 10, "сталь", 3000); 
print_r($good001->getInfo());




class A {
	public function foo() {
		static $x = 0;
		echo ++$x;
	}
}

$a1 = new A();
$a2 = new A();
$a1->foo(); 
$a2->foo();
$a1->foo();
$a2->foo();

// Выводит 1 2 3 4 потому что переменная статична, а инкремент префиксный. Но кстати не понимаю почему она не назначается каждый раз равной нулю

class A1 {
	public function foo() {
		static $x = 0;
		echo ++$x;
	}
}
class B extends A1 {
}
$a1 = new A1();
$b1 = new B();
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo();


// Выводит 1 1 2 2 , видимо для каждого класса задается отдельная переменная
// А нормально то что 7ое задание совпадает с 6ым?
?>