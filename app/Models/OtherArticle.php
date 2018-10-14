<?PHP

namespace App\Models;

use LaravelRocket\Foundation\Models\Base;

/**
 * App\Models\OtherArticle.
 *
 * @method \App\Presenters\OtherArticlePresenter present()
 *
 */

class OtherArticle extends Base
{



    /**
     * The database table used by the model.
     *
     * @var  string
     */
    protected $table = 'other_articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'title',
        'link',
        'imgURL',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var  array
     */
    protected $hidden = [];

    protected $dates  = [
    ];

    protected $casts     = [
    ];

    protected $presenter = \App\Presenters\OtherArticlePresenter::class;

    // Relations

    // Utility Functions

}
