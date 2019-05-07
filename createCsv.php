<?php

use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

$writer = WriterFactory::create(Type::CSV);
$writer->setShouldAddBOM(false);
$writer->openToFile('data.csv');


$faker = Faker\Factory::create();
$faker->addProvider(new Faker\Provider\Fakecar($faker));

for ($i = 0; $i < 100000; $i++) {
    $res = [];
    $res['mpn'] = $faker->vin;
    $res['brand'] = $faker->vehicleBrand;
    $res['prod_title'] = $faker->vehicleModel;
    $res['status'] = $faker->boolean ? 'enabled' : 'disabled';
    $res['prod_category'] = $faker->numberBetween(1, 50) > 25 ? $faker->numberBetween(1, 10) . '/' . $faker->numberBetween(10, 25) : $faker->numberBetween(1, 50);
//    dd($res);
    $writer->addRow($res);
}
$writer->close();