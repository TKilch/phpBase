<?php
// Создаем класс
class Product
{
    public $name;
    public $nameFontSize;
    public $price;
    public $priceFontSize;
    public $weight;
    public $weightFontSize;
    public $border;
    public $color;

// Конструктор
    public function __construct(string $name,int $price,int $weight,$color,$nameFontSize = '20px',$priceFontSize = '14px',$weightFontSize = '10px',$border = '3px solid grey'){
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->nameFontSize = $nameFontSize;
        $this->priceFontSize = $priceFontSize;
        $this->weightFontSize = $weightFontSize;
        $this->color = $color;
        $this->border = $border;
    }
// Функция вывода на экран всей информации
    public function print(){
        echo "
        <div style='border: {$this->border}'>
        <h1 style='font-size: {$this->nameFontSize};color: {$this->color}'>{$this->name}</h1>
        <h2 style='font-size: {$this->priceFontSize};color: {$this->color}'>{$this->price}</h2>
        <h2 style='font-size: {$this->priceFontSize};color: {$this->color}'>{$this->priceWithoutNDS}</h2>
        <h3 style='font-size: {$this->weightFontSize};color: {$this->color}'>{$this->weight}</h3>
        </div>
        ";
    }
// функция вывода цены без НДС
    public function priceWithoutNDS(){
        $newPrice = $this->price * 0.8;
        echo "<div style='border: 3px solid red'>{$this->name} : price without NDS : " . $newPrice . "</div>";
    }
}
// Присваиваем значения и выводим информацию и цену без НДС
$test1 = new Product('pineapple','78.9','0.87','#00FF00');
$test1->print();
$test1->priceWithoutNDS();
$test2 = new Product('Apples','59.9','1.24','green');
$test2->print();
$test2->priceWithoutNDS();
$test3 = new Product('Orange','65.5','0.35','orange');
$test3->print();
$test3->priceWithoutNDS();