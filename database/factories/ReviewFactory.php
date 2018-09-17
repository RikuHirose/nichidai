<?PHP

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Review::class, function (Faker\Generator $faker) {

    return [
        'lesson_id' => 0,
        'user_id' => 0,
        'review_content' => null,
    ];
});
