<?PHP

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Affiliate::class, function (Faker\Generator $faker) {

    return [
        'lesson_id' => 0,
        'lesson_textbook' => null,
        'lesson_read' => null,
        'amazon_a_href' => null,
        'amazon_img_src' => null,
        'amazon_title' => null,
        'moshimo_img_src' => null,
    ];
});
