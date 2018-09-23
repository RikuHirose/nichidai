<?PHP

namespace App\Models;

use LaravelRocket\Foundation\Models\Base;

/**
 * App\Models\Affiliate.
 *
 * @method \App\Presenters\AffiliatePresenter present()
 *
 */

class Affiliate extends Base
{



    /**
     * The database table used by the model.
     *
     * @var  string
     */
    protected $table = 'affiliates';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'lesson_id',
        'lesson_textbook_id',
        'lesson_read_id',
        'amazon_a_href',
        'amazon_img_src',
        'amazon_title',
        'moshimo_img_src',
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

    protected $presenter = \App\Presenters\AffiliatePresenter::class;

    // Relations
    public function lesson()
    {
        return $this->belongsTo(\App\Models\Lesson::class, 'lesson_id', 'id');
    }




    // Utility Functions

}
