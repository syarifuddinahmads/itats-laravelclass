<?php

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title_article' => $faker->sentence(2),
        'content_article' => $faker->sentence(15)
    ];
});
