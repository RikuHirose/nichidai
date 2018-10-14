<?PHP

namespace Tests\Models;

use App\Models\OtherArticle;
use Tests\TestCase;

class OtherArticleTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Models\OtherArticle $otherArticle */
        $otherArticle = new OtherArticle();
        $this->assertNotNull($otherArticle);
    }

    public function testStoreNew()
    {
        /** @var    \App\Models\OtherArticle $otherArticle */
        $otherArticleModel = new OtherArticle();

        $otherArticleData = factory(OtherArticle::class)->make();
        foreach( $otherArticleData->toFillableArray() as $key => $value ) {
            $otherArticleModel->$key = $value;
        }
        $otherArticleModel->save();

        $this->assertNotNull(OtherArticle::find($otherArticleModel->id));
    }

}
