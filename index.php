<?
header("Content-Type: text/html; charset=utf-8");
abstract class AbstractProduct {
	public $name;
	public $price;
    public function __construct($name, $price) {
		$this->name = $name;
		$this->price = $price;
    }
    abstract public function count();
}

class DigitalProduct extends AbstractProduct{
	public $amount = 1;
	public $measure = "штук(и)";
    public function count(){
    	return $this->price/2;
    }

}

class Product extends AbstractProduct{
	public $measure = "штук(и)";
    public function __construct($name, $price, $amount) {
    	parent::__construct($name, $price);
		$this->amount = $amount; // количество покупаемого товара
    }
    public function count(){
		return $this->price*$this->amount;
    }
}

class ProductByWeight extends AbstractProduct{
	public $measure = "грамм(а/ов)";
    public function __construct($name, $price, $amount, $amount_step) {
    	parent::__construct($name, $price);
		$this->amount = $amount; // количество покупаемого товара, в граммах
		$this->amount_step = $amount_step; // количество товара, которое стоит price денег, в граммах
    }
    public function count(){
		return $this->price*$this->amount/$this->amount_step;
    }
}

function printCost($good){
	echo $good->name." в количестве ".$good->amount." ".$good->measure." продан за ".$good->count(). " денег<br>";
}

$digitalGood = new DigitalProduct("Windows", 7000);
printCost($digitalGood);

$good = new Product("Диск с Windows", 7000, 2);
printCost($good);

$goodByWeight = new ProductByWeight("Распылённый диск с Windows", 500, 10, 1);
printCost($goodByWeight);
?>