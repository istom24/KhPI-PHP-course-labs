<?php
class Product{
    public string $name;
    protected float $price;
    public string $description;

    function __construct(string $name, float $price, string $description){
        if ($price < 0) {
            throw new InvalidArgumentException("Ціна не може бути від'ємною");
        }
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }
    public function getInfo():string {
        return "<br>Назва: {$this->name}<br>
       Ціна: {$this->price}<br>
       Опис: {$this->description}<br>";
    }
}
class DiscountedProduct extends Product{
    public float $discount;
    function __construct(string $name, float $price, string $description, float $discount){
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }
    public function getDiscounted() : float {
        return $this->price * (1 - $this->discount / 100);
    }
    public function getInfo() : string{
        return parent::getInfo() . "Знижка: " . $this->discount . "%<br>" .
            "Нова ціна: " . $this->getDiscounted() . "<br>";
    }

}
$product1= new Product("Сметана", 100, "Президент");
$product2= new Product("Сметана", 150, "ДоброСмак");

$discountedProduct1=  new DiscountedProduct("Молоко", 45, "Галичина", 25);

echo "Товар:" . $product1->getInfo() . "<br>";
echo "Товар:" . $product2->getInfo() . "<br>";
echo "Товар зі знижкою:" . $discountedProduct1->getInfo() . "<br>";

class Category
{
    public string $name;
    public array $products;
    public function __construct(string $name){
        $this->name = $name;
        $this->products = [];
    }

    public function addProduct(Product $product) : void {
        $this->products[] = $product;
    }

    public function getInfo(): string{
        $info = "<br>Категорія: {$this->name}</br>";
        foreach ($this->products as $product) {
            $info .= $product->getInfo();
        }
        return $info;
    }
}

$category = new Category("Молочні продукти");
$category->addProduct($product1);
$category->addProduct($product2);

echo $category->getInfo();

$discountCategory = new Category("Товари зі знижкою");
$discountCategory->addProduct($discountedProduct1);

echo $discountCategory->getInfo();
?>

