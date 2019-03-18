<?php

//класс Товар
abstract class Good
{
    //свойства товара
    public $id;
    public $name;
    public $description;
    public $price;
    public $quantity;
    public $discount;
    public $finalPrice;
    public $unit;

    //функция вывода краткой информации о товаре
    public function shortView()
    {
        if ($this->discount > 0) {
            $this->finalPrice = $this->price - $this->price * $this->discount * 0.01;
        } else {
            $this->finalPrice = $this->price;
        }

        echo "<br>Описание товара:<br>$this->name, цена: $this->price руб., остаток на складе: $this->quantity $this->unit
              <br>Размер скидки: $this->discount %.
              <br>Финальная цена: $this->finalPrice руб.<br>";
    }

    //функция установки размера скидки на товар
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    abstract protected function sumSold($soldAmount);
}

//класс Одежда, наследующий свойства и методы класса Товар
class Wear extends Good
{
    //свойства товара - одежда
    public $size;
    public $color;

    //функция конструктор для создания объекта товара
    public function __construct($id, $name, $description, $price, $quantity, $size, $color, $unit, $discount = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->size = $size;
        $this->color = $color;
        $this->unit = $unit;
        $this->discount = $discount;
    }

    public function sumSold($soldAmount)
    {
        return $this->name . ' продано в количестве ' . $soldAmount . ' ' . $this->unit . ' на сумму ' . $soldAmount * $this->price . ' руб.<br>';
    }
}

//класс Еда, наследующий свойства и методы класса Товар
class Food extends Good
{
    //свойства товара - еда
    public $type;
    public $weight;

    //функция конструктор для создания объекта товара
    public function __construct($id, $name, $description, $price, $quantity, $type, $weight, $unit, $discount = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->type = $type;
        $this->weight = $weight;
        $this->unit = $unit;
        $this->discount = $discount;
    }

    public function sumSold($soldAmount)
    {
        return $this->name . ' продано в количестве ' . $soldAmount . ' ' . $this->unit . ' на сумму ' . $soldAmount * $this->price . ' руб.<br>';
    }
}

//класс Телефон, наследующий свойства и методы класса Товар
class Phone extends Good
{
    //свойства товара - телефон
    public $ram;
    public $rom;

    //функция конструктор для создания объекта товара
    public function __construct($id, $name, $description, $price, $quantity, $ram, $rom, $unit, $discount = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->ram = $ram;
        $this->rom = $rom;
        $this->unit = $unit;
        $this->discount = $discount;
    }

    public function sumSold($soldAmount)
    {
        return $this->name . ' продано в количестве ' . $soldAmount . ' ' . $this->unit . ' на сумму ' . $soldAmount * $this->price . ' руб.<br>';
    }
}

$shirt = new Wear('1', 'Рубашка', 'Клёвая рубашка', '3500', '32', 'XL', 'синий', 'шт.', '10');
$apple = new Food('2', 'Яблоко', 'Отличное зелёное яблоко', '50', '500', 'фрукты', '0.2', 'кг');
$iphone = new Phone('3', 'Iphone', 'Телефончик', '95000', '12', '32', '256', 'шт.', '10');

$shirt->shortView();
$shirt->setDiscount(5);
$shirt->shortView();
$apple->shortView();
echo $apple->sumSold(15);
echo $shirt->sumSold(3);
echo $iphone->sumSold(1);