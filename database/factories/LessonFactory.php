<?PHP

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Lesson::class, function (Faker\Generator $faker) {

    return [
        'faculty_id' => 0,
        'sub_title' => null,
        'subsub_title' => null,
        'lesson_title' => null,
        'lesson_term' => null,
        'lesson_date' => null,
        'lesson_credit' => null,
        'lesson_professor' => null,
        'lesson_objectives' => null,
        'lesson_content' => null,
        'lesson_style' => null,
        'lesson_evaluation' => null,
        'lesson_textbook' => null,
        'lesson_read' => null,
        'lesson_officehour' => null,
        'lesson_info' => null,
        'evaluate_exam' => null,
        'evaluate_report' => null,
        'evaluate_mintest' => null,
        'evaluate_apply' => null,
        'evaluate_others' => null,
        'evaluate_total' => null,
        'url' => null,
        'year' => null,
    ];
});
