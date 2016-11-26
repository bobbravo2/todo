<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\ToDo::class, function (Faker\Generator $faker) {
	$task = $faker->firstName . ' in ' . $faker->city . ' with '. $faker->name . ' (the ' . $faker->jobTitle . ', dummy)';
	return [
		'task' => $task,
		'due' => $faker->dateTimeBetween('+2 days', '+2 years'),
		'completed' => $faker->boolean(20)
	];
});