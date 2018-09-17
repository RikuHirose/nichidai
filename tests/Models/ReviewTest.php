<?PHP

namespace Tests\Models;

use App\Models\Review;
use Tests\TestCase;

class ReviewTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Models\Review $review */
        $review = new Review();
        $this->assertNotNull($review);
    }

    public function testStoreNew()
    {
        /** @var    \App\Models\Review $review */
        $reviewModel = new Review();

        $reviewData = factory(Review::class)->make();
        foreach( $reviewData->toFillableArray() as $key => $value ) {
            $reviewModel->$key = $value;
        }
        $reviewModel->save();

        $this->assertNotNull(Review::find($reviewModel->id));
    }

}
