<?php

//класс Товар
class Good
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
}

$shirt = new Wear('1', 'Рубашка', 'Клёвая рубашка', '3500', '32', 'XL', 'синий', 'шт.', '10');
$apple = new Food('2', 'Яблоко', 'Отличное зелёное яблоко', '50', '500', 'фрукты', '0.2', 'кг');

$shirt->shortView();
$shirt->setDiscount(5);
$shirt->shortView();
$apple->shortView();

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); // 1
$a2->foo(); // 2
$a1->foo(); // 3
$a2->foo(); // 4 тк переменная $x принадлежит непосредственно классу и каждый раз изменяется,
            // независимо от того, из какого объекта к ней обращаются

class A1 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B1 extends A1 {
}
$a1 = new A1();
$b1 = new B1();
$a1->foo(); // 1
$b1->foo(); // 1
$a1->foo(); // 2
$b1->foo(); // 2 тк в объекте a1 используется переменная из класса A1, в объекте b1 используется переменная из класса B1