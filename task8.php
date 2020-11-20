<?php

// Абстрактный класс
abstract class Product
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


// Конструктор
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
// Вывод информации
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
// цена без ндс
    public function priceWithoutNDS(){
        $newPrice = $this->price * 0.8;
        echo "<div style='border: 3px solid red'>{$this->name} : price without NDS : " . $newPrice . "</div>";
    }
    // Вывод фото на фон(в обьектах)
    public function showImage(){
        echo "
        <div style='border: {$this->border};width: {$this->imageWidth};height: {$this->imageHeight}'> <!--add background img -->
        <h1 style='font-size: {$this->nameFontSize};color: {$this->color}'>{$this->name}</h1>
        <h1 style='font-size: {$this->priceFontSize};color: {$this->color}'>{$this->price}</h1>
        <h1 style='font-size: {$this->weightFontSize};color: {$this->color}'>{$this->weight}</h1>
        </div>";
    }
}
// Обьект шоколад со своим фото
class Chocolate extends Product
{
    protected $calories;


   public function __construct(string $name, int $price, int $weight, $color, $imageWidth, $imageHeight,int $calories,$border = '3px solid grey', $nameFontSize = '20px', $priceFontSize = '14px', $weightFontSize = '10px')
   {
       parent::__construct($name, $price, $weight, $color, $imageWidth, $imageHeight,$nameFontSize, $priceFontSize, $weightFontSize, $border);
       $this->calories = $calories;
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
// Обьект Candy со своим фото
class Candy extends Product
{
    public function __construct(string $name, int $price, int $weight, $color, $imageWidth, $imageHeight, $nameFontSize = '20px', $priceFontSize = '14px', $weightFontSize = '10px', $border = '3px solid grey')
    {
        parent::__construct($name, $price, $weight, $color, $imageWidth, $imageHeight, $nameFontSize, $priceFontSize, $weightFontSize, $border);
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

// вывод обьектов
$chocolate = new Chocolate('Bounty','59','350','blue','200px','200px','100','5px solid blue');
$chocolate->showImage();

$candy = new Candy('Mars','55','345','red','100px','100px','5px solid red');
$candy->showImage();