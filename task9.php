<?php
// Интерфейсы
interface iPrintString
{
    public function printString();
}

interface iPrintInt
{
    public function printInt();
}

interface iPrintMix
{
    public function printMix();
}
// Абстракный класс вместе с интерфейсами
abstract class Product implements iPrintString,iPrintInt,iPrintMix
{
    protected $name;
    protected $nameFontSize;
    protected $price;
    protected $priceFontSize;
    protected $weight;
    protected $weightFontSize;
    protected $border;
    protected $color;
    protected $imageWidth;
    protected $imageHeight;
    public static $companyName = 'Nestle';
    const YEAR_START = 2010;

    // функции из интерфейсов:

    public function printInt()
    {
        echo 123 . "<br/>";
    }

    public function printString()
    {
        echo "123 <br/>";
    }

    public function printMix()
    {
        echo 123 . ", 123 <br/>";
    }


    public function __construct(string $name,int $price,int $weight,$color,$imageWidth,$imageHeight,$nameFontSize = '20px',$priceFontSize = '14px',$weightFontSize = '10px',$border = '3px solid grey'){
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->nameFontSize = $nameFontSize;
        $this->priceFontSize = $priceFontSize;
        $this->weightFontSize = $weightFontSize;
        $this->color = $color;
        $this->border = $border;
        $this->imageWidth = $imageWidth;
        $this->imageHeight = $imageHeight;
    }

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

    public function priceWithoutNDS(){
        $newPrice = $this->price * 0.8;
        echo "<div style='border: 3px solid red'>{$this->name} : price without NDS : " . $newPrice . "</div>";
    }

    public function showImage(){
        echo "
        <div style='border: {$this->border};width: {$this->imageWidth};height: {$this->imageHeight}'> <!--add background img -->
        <h1 style='font-size: {$this->nameFontSize};color: {$this->color}'>{$this->name}</h1>
        <h1 style='font-size: {$this->priceFontSize};color: {$this->color}'>{$this->price}</h1>
        <h1 style='font-size: {$this->weightFontSize};color: {$this->color}'>{$this->weight}</h1>
        </div>";
    }

    public static function showCompanyInfo()
    {
        echo "Company name : " . Product::$companyName . "<br/>";
        echo "Started working : " . Product::YEAR_START. "<br/>";
    }

}

class Chocolate extends Product
{
    protected $calories;


    public function __construct(string $name, int $price, int $weight, $color, $imageWidth, $imageHeight,int $calories,$border = '3px solid grey', $nameFontSize = '20px', $priceFontSize = '14px', $weightFontSize = '10px')
    {
        parent::__construct($name, $price, $weight, $color, $imageWidth, $imageHeight,$nameFontSize, $priceFontSize, $weightFontSize, $border);
        $this->calories = $calories;
    }

// Реализация функции set
    public function __set($name, $value)
    {
        echo 'Вы не можете присвоить к приватному свойству ' . $name . " значение " . $value;
    }

    public function showImage(){
        $priceWithoutNDS = $this->price * 0.8;
        echo "
        <div style='background:url(bounty.jpeg);background-size: cover;border: {$this->border};width: {$this->imageWidth};height: {$this->imageHeight}'> <!--add background img -->
        <h1 style='font-size: {$this->nameFontSize};color: {$this->color}'>Name : {$this->name}</h1>
        <h1 style='font-size: {$this->priceFontSize};color: {$this->color}'>Price : {$this->price}</h1>
        <h1 style='font-size: {$this->priceFontSize};color: {$this->color}'>Price without NDS : {$priceWithoutNDS}</h1>
        <h1 style='font-size: {$this->weightFontSize};color: {$this->color}'>Weight : {$this->weight}</h1>
        <h1 style='font-size: {$this->weightFontSize};color: {$this->color}'>Calories : {$this->calories}</h1>
        </div>";
    }
}

class Candy extends Product
{
    private $private;

    public function __construct(string $name, int $price, int $weight, $color, $imageWidth, $imageHeight, $nameFontSize = '20px', $priceFontSize = '14px', $weightFontSize = '10px', $border = '3px solid grey')
    {
        parent::__construct($name, $price, $weight, $color, $imageWidth, $imageHeight, $nameFontSize, $priceFontSize, $weightFontSize, $border);
    }
    // реализация функции get
    public function __get($name)
    {
        echo $name . " - приватное свойство, к которому нельзя обратиться";
    }

    public function showImage(){
        $priceWithoutNDS = $this->price * 0.8;
        echo "
        <div style='background:url(mars.jpg);background-size: cover;border: {$this->border};width: {$this->imageWidth};height: {$this->imageHeight}'> <!--add background img -->
        <h7 style='font-size: {$this->nameFontSize};color: {$this->color}'>Name : {$this->name}</h7>
        <h7 style='font-size: {$this->priceFontSize};color: {$this->color}'>Price : {$this->price}</h7>
        <h7 style='font-size: {$this->priceFontSize};color: {$this->color}'>Price without NDS : {$priceWithoutNDS}</h7>
        <h7 style='font-size: {$this->weightFontSize};color: {$this->color}'>Weight : {$this->weight}</h7>
        </div>";
    }


}


$chocolate = new Chocolate('Bounty','59','350','blue','200px','200px','100','5px solid blue');
$candy = new Candy('Mars','55','345','red','100px','100px','5px solid red');

$candy->private;
echo "<br/>";
$chocolate->smth = 555;
echo "<br/>";


// Выводим через класс и дочерник класс
Product::showCompanyInfo();
echo "<br/>";
$chocolate::showCompanyInfo();