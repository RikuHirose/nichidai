<?PHP

namespace Tests\Repositories;

use App\Models\Affiliate;
use Tests\TestCase;

class AffiliateRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Repositories\AffiliateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\AffiliateRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $models = factory(Affiliate::class, 3)->create();
        $affiliateIds = $models->pluck('id')->toArray();

        /** @var    \App\Repositories\AffiliateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\AffiliateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $modelsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Affiliate::class, $modelsCheck[0]);

        $modelsCheck = $repository->getByIds($affiliateIds);
        $this->assertEquals(3, count($modelsCheck));
    }

    public function testFind()
    {
        $models = factory(Affiliate::class, 3)->create();
        $affiliateIds = $models->pluck('id')->toArray();

        /** @var    \App\Repositories\AffiliateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\AffiliateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $affiliateCheck = $repository->find($affiliateIds[0]);
        $this->assertEquals($affiliateIds[0], $affiliateCheck->id);
    }

    public function testCreate()
    {
        $affiliateData = factory(Affiliate::class)->make();

        /** @var    \App\Repositories\AffiliateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\AffiliateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $affiliateCheck = $repository->create($affiliateData->toFillableArray());
        $this->assertNotNull($affiliateCheck);
    }

    public function testUpdate()
    {
        $affiliateData = factory(Affiliate::class)->create();

        /** @var    \App\Repositories\AffiliateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\AffiliateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $affiliateData = factory(Affiliate::class)->make();

        $affiliateCheck = $repository->update($affiliateData, $affiliateData->toFillableArray());
        $this->assertNotNull($affiliateCheck);
    }

    public function testDelete()
    {
        $affiliateData = factory(Affiliate::class)->create();

        /** @var    \App\Repositories\AffiliateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\AffiliateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($affiliateData);

        $affiliateCheck = $repository->find($affiliateData->id);
        $this->assertNull($affiliateCheck);
    }

}
