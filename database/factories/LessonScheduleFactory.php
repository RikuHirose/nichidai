<?PHP

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\LessonSchedule::class, function (Faker\Generator $faker) {

    return [
        'lesson_id' => 0,
        'lesson_title' => null,
        'lesson_round' => null,
        'lesson_round_title' => null,
    ];
});
