<?php

use App\User;
use App\Book;
use App\Publisher;
use App\Review;
use App\Shipper;
use App\Order;
use App\Discount;
use App\Genre;
use App\Author;

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'postal_code'=>$faker->postcode,
        'street'=>$faker->streetName,
        'building_no'=>$faker->buildingNumber,
        'flat_no'=>$faker->buildingNumber,
        'city'=>$faker->city,
        'phone_number'=>$faker->phoneNumber,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Book::class, function (Faker $faker) {
    return [

        'author_id'=> function(){
            return factory(App\Author::class)->create()->id;
        },
        'publisher_id'=> function(){
            return factory(App\Publisher::class)->create()->id;
        },
        'description' => $faker->paragraph,
        'img' => $faker->image(),
        'title' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'publication_date'=> $faker->date(),
        'edition'=> $faker->randomDigit,
        'available_quantity'=> $faker->randomDigit,
        'price'=> $faker->randomDigit,

    ];
});

$factory->define(Publisher::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'company_name'=> $faker->company,
    ];
});

$factory->define(Review::class, function (Faker $faker) {
    return [
        'book_id'=>function(){
            return factory(App\Book::class)->create()->id;
        },
    'user_id'=>function(){
        return factory(App\User::class)->create()->id;
    },
    'review'=> $faker->randomDigit,

    ];
});

$factory->define(Discount::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'value' => $faker->randomDigit,

    ];
});

$factory->define(Genre::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,

    ];
});

$factory->define(Shipper::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone_number'=>$faker->phoneNumber,
    ];
});

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id'=>function(){
            return factory(App\User::class)->create()->id;
        },
        'discount_id'=>function(){
            return factory(App\Discount::class)->create()->id;
        },
        'shipper_id'=>function(){
            return factory(App\Shipper::class)->create()->id;
        },
        'state'=> $faker->boolean,
    ];
});

