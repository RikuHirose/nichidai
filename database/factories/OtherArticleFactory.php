<?PHP

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\OtherArticle::class, function (Faker\Generator $faker) {

    return [
        'title' => null,
        'link' => null,
        'imgURL' => null,
    ];
});
