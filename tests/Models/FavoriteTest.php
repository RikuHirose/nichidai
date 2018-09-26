<?PHP

namespace Tests\Models;

use App\Models\Favorite;
use Tests\TestCase;

class FavoriteTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Models\Favorite $favorite */
        $favorite = new Favorite();
        $this->assertNotNull($favorite);
    }

    public function testStoreNew()
    {
        /** @var    \App\Models\Favorite $favorite */
        $favoriteModel = new Favorite();

        $favoriteData = factory(Favorite::class)->make();
        foreach( $favoriteData->toFillableArray() as $key => $value ) {
            $favoriteModel->$key = $value;
        }
        $favoriteModel->save();

        $this->assertNotNull(Favorite::find($favoriteModel->id));
    }

}
