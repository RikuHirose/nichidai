<?PHP

namespace Tests\Models;

use App\Models\Affiliate;
use Tests\TestCase;

class AffiliateTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Models\Affiliate $affiliate */
        $affiliate = new Affiliate();
        $this->assertNotNull($affiliate);
    }

    public function testStoreNew()
    {
        /** @var    \App\Models\Affiliate $affiliate */
        $affiliateModel = new Affiliate();

        $affiliateData = factory(Affiliate::class)->make();
        foreach( $affiliateData->toFillableArray() as $key => $value ) {
            $affiliateModel->$key = $value;
        }
        $affiliateModel->save();

        $this->assertNotNull(Affiliate::find($affiliateModel->id));
    }

}
