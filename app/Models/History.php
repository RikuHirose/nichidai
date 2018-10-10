<?PHP

namespace App\Models;

use LaravelRocket\Foundation\Models\Base;

/**
 * App\Models\History.
 *
 * @method \App\Presenters\HistoryPresenter present()
 *
 */

class History extends Base
{



    /**
     * The database table used by the model.
     *
     * @var  string
     */
    protected $table = 'histories';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'lesson_id',
        'user_id',
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

    protected $presenter = \App\Presenters\HistoryPresenter::class;

    // Relations
    public function lesson()
    {
        return $this->belongsTo(\App\Models\Lesson::class, 'lesson_id', 'id');
    }



    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }




    // Utility Functions

}
