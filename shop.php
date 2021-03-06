<?php
/**
 * 依赖注入
 */
require __DIR__ . "/vendor/autoload.php";

// 实例化工厂类
$factory = new Factory\ProductFactory();
$factory->instance('shoes', $factory->make('Product\Shoes'));
$factory->instance('clothes', $factory->make('Product\Clothes'));

$factory->bind('shoes', function () use ($factory){
    $factory->make('\Product\Shoes');
});

// new 太多了，引入工厂模式
$shopClothes = new \Shop\ShopClothes();
$shopShes = new \Shop\ShopShoes();

//$factory->make('Product\Clothes');

// 工厂模式，创造一个工厂类，用来实例化对象，再把实例化好的对象传参到另一个类中
$shopClothes->setProduct($factory->make('clothes'));
$shopShes->setProduct($factory->make('shoes'));


var_dump($shopClothes, $shopShes);